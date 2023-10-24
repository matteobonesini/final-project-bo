import Chart from 'chart.js/auto';
Chart.defaults.color = '#ffffff';

console.log('array messaggi ', messagesArr);

function getData(entity){
	const years = [
		{
			name: '',
			months: [
				{
					name: '',
					messages: 0,
				}
			]
		}
	];
	let arrayCounter = 0;
	let year;
	let month;
	let totalMessages = 0;
	

	let i = 0;
	while ( totalMessages < entity.length) {

		totalMessages = 0;
		years.forEach( y => {
			y.months.forEach( month => {
				totalMessages += month.messages;
			})
		})
		console.log('messaggi in array',totalMessages ,'entità messaggi', entity.length);
		console.log('index',i,'counter', arrayCounter);

		const element = entity[i];
		console.log(element)

		if(element != undefined){
			year = new Date(element.created_at).getFullYear();
			month = new Date(element.created_at).toLocaleString('en', { month: 'long' });
			
			const arrayYear = years[arrayCounter];
			if(arrayYear != undefined){console.log(arrayYear.name, year)};

			if (years[0].name == '') {
				console.log('inserisco il primo oggetto');
				years[0] = {
					name: year,
					average: 0,
					messages: 0,
					months: [
						{
							name: month,
							messages: 1,
						}
					],
				};
				console.log('totale messaggi',totalMessages)
			}
			else{
				for (let index = 0; index <= years.length; index++) {
					const singleYear = years[index];
					if (singleYear != undefined){
						console.log('anno diverso da undefined', singleYear);
						if (singleYear.name == year){
							singleYear.months.push({
								name: month,
								messages: 1,
							});
							break;
						}
						else if(singleYear.name != year && index == years.length){
							console.log('anno non presente, lo aggiungo e aumento counter')
							years.push({
								name: year,
								months: [
									{
										name: month,
										messages: 1,
									}
								],
							});
							arrayCounter++;
							break;
						}
					}
					else{
						console.log('anno non presente, lo aggiungo e aumento counter')
						years.push({
							name: year,
							months: [
								{
									name: month,
									messages: 1,
								}
							],
						});
						arrayCounter++;
						break;
					}
				}
			}
			console.log(years);
			console.log('----------');
			i++;
		}
	}
	console.log(years);
	let average;
	let yearAverage;
	years.forEach(yearSingle => {
		let messageYear = 0;
		yearSingle.months.forEach(
			month => {
				messageYear += month.messages;
			}
		);
		yearAverage = messageYear / 12;
		yearSingle.average = yearAverage;
		totalMessages += messageYear;
		yearSingle.messages = messageYear
	});
	console.log(totalMessages);

	average = totalMessages / years.lenght;
	console.log('messaggi ', totalMessages);
	console.log('media ', average);
	return [years];
};

// const slicedArray = messagesArr.slice(0, 10);
// console.log(slicedArray);
// getData(slicedArray);


const messageData = getData(messagesArr);
console.log(messageData, messageData[0].length);

const messageFilter = document.getElementById('message-select');
let graphResult;
	
function graphDataCreate(){
	console.log(messageFilter.value);
	let graphData = [];
	// Select filter 'YEAR'
	if (messageFilter.value == 'anno') {
		graphData = [];
		const date = new Date(Date.now()).getFullYear();
		console.log(date)
		for (let ind = 0; ind < messageData[0].length; ind++) {
			const element = messageData[0][ind];
			if (element.name == date) {
				graphData.push(element);
			}
		}
	};

	// Select filter '6 MONTHS'
	if (messageFilter.value == 'mesi-6') {

		graphData = [];
		const date = new Date(Date.now()).getMonth();

		// funzione per prendere 
		function prendiElementiPrecedenti(arr, numero) {
			const risultato = [];
			for (let i = 0; i < 6; i++) {
				const indice = (arr.length + numero - i) % 12; // Calcola l'indice con wrap-around
				console.log(indice)
				risultato.push(arr[indice]);
			}
			return risultato;
		}
		const arrayDiInteri = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
		const risultato = prendiElementiPrecedenti(arrayDiInteri, date);

		const now = new Date(Date.now()).getFullYear();

		for (let ind = 0; ind < messageData[0].length; ind++) {
			const element = messageData[0][ind];
			// controllo l'anno 
			if(element.name == now){

				console.log('anno ok',element)
				// preso l'anno giusto, prendo gli oggetti mesi precedenti al mese attuale i quali corrispondono
				// a quelli presenti nell'array 'risultato' transformata da numeri a stringhe
				let selectedMonths = [];
				for (let iter = 0; iter < 6; iter++) {

					let selectMonth = Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(`${risultato[iter]}`));
					selectedMonths.push(selectMonth);
					console.log(selectedMonths)
				}
				for (let iter = 0; iter < 6; iter++) {

					const singleMonth = element.months[iter];

					if(singleMonth != undefined){
						console.log('entra?',selectedMonths,singleMonth.name,  selectedMonths.includes(singleMonth.name))
						if (selectedMonths.includes(singleMonth.name)) {
							
							console.log('CHECK', singleMonth.name)
							graphData.push(singleMonth);
						}
					}
				}
			}
		}
	};
	console.log('GraphData = ', graphData)
	
	return graphData;
}
let graph;
graphResult = graphDataCreate();
messageFilter.addEventListener('change', () => {
	graphResult = graphDataCreate();
	if(graph != undefined){
		graph.destroy();
	}
	//Media messaggi anno
	graph =	new Chart(
		document.getElementById('messages'),
		{
			type: 'bar',
			data: {
				labels: graphResult.map(row => row.name),
				datasets: [
					{
						label: 'Media messaggi ricevuti per anno',
						data: graphResult.map(row => row.messages),
						backgroundColor: '#1dbf73',
					}
				],
			}
		}
	);
});

//Media messaggi anno
graph =	new Chart(
	document.getElementById('messages'),
	{
		type: 'bar',
		data: {
			labels: graphResult.map(row => row.name),
			datasets: [
				{
					label: 'Media messaggi ricevuti per anno',
					data: graphResult.map(row => row.messages),
					backgroundColor: '#1dbf73',
				}
			],
		}
	}
);