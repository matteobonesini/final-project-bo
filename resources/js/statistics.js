import Chart from 'chart.js/auto';
Chart.defaults.color = '#ffffff';
console.log(reviewsArr)
console.log(messagesArr)
console.log(votesArr)

//---------------------------------------------
// Messages

function getMessageData(entity){
	const years = [
		{
			name: '',
			items: 0,
			average: 0,
			months: [
				{
					name: '',
					items: 0,
					average: 0,
					days: [
						{
							name:'',
							items: 0,
							average: 0,
							hours: [
								{
									name:'',
									items: 0,
									average: 0,
								}
							]
						}
					]
				}
			]
		}
	];
	let arrayCounter = 0;
	let year;
	let month;
	let day;
	let hour;
	let totalMessages = 0;

	let i = 0;
	while ( totalMessages < entity.length) {
		totalMessages = 0;
		for (let z = 0; z < years.length; z++) {
			const year = years[z];
			for (let x = 0; x < year.months.length; x++) {
				const month = year.months[x];
				for (let c = 0; c < month.days.length; c++) {
					const day = month.days[c];
					for (let v = 0; v < day.hours.length; v++) {
						const hour = day.hours[v];
						totalMessages ++;
						console.log('add')
					}
				}
			}
		} 
		console.log(years)
		console.log('messaggi in array',totalMessages ,'entità messaggi', entity.length);
		console.log('index',i,'counter', arrayCounter);
		const element = entity[i];
		console.log(element)
		
		if(element != undefined){
			year = new Date(element.created_at).getFullYear();
			month = new Date(element.created_at).toLocaleString('en', { month: 'long' });
			day = new Date(element.created_at).toLocaleString('en', { day: 'numeric' });
			// function addHours() {
			// 	hour = new Date(element.created_at);
			// 	hour.setTime(hour.getTime() + (2*60*60*1000));
			// 	hour = new Date(hour).toLocaleTimeString();
			// 	return hour;
			// }
			// addHours();
			hour = new Date(element.created_at).getHours();
			console.log(year, month, day, hour)
			
			const arrayYear = years[arrayCounter];
			if(arrayYear != undefined){console.log(arrayYear.name, year)};

			// IF the name of the first object in array 'years' is empty
			if (years[0].name == '') {
				console.log('inserisco il primo oggetto');
				years[0] = {
					name: year,
					items: 1,
					months: [
						{
							name: month,
							items: 1,
							days: [
								{
									name:day,
									items: 1,
									hours: [
										{
											name: hour,
											items: 1,
										}
									]
								}
							]
						}
					],
				};
				console.log('totale messaggi',totalMessages)
			}
			else{
				block1: for (let index = 0; index <= years.length; index++) {
					const singleYear = years[index];
					// IF exist more than one 'year' in 'years'
					if (singleYear != undefined){
						console.log('anno diverso da undefined', singleYear);
						// IF the name of the year in years is the same of the message year
						if (singleYear.name == year){
							console.log('nomi anno uguali')
							for (let b = 0; b < singleYear.months.length; b++) {
								const singleMonth = singleYear.months[b];

								if (singleMonth.name == month) {
									console.log('nomi mese uguali')
									for (let n = 0; n < singleMonth.days.length; n++) {
										const singleDay = singleMonth.days[n];

										if (singleDay.name == day ) {
											console.log('nomi giorno uguali')
											for (let m = 0; m < singleDay.hours.length; m++) {
												const singleHour = singleDay.hours[m];

												if (singleHour.name == hour) {
													console.log('ora uguale')
													singleHour.items ++;
													singleMonth.items ++;
													singleYear.items ++;

													singleHour.average = singleHour.items / 24;
													singleDay.average = singleDay.items / 7;
													singleMonth.average = singleMonth.items / 30;
													singleYear.average = singleYear.items / 365;

													break block1;
												}
												else if(singleHour.name != hour && m == singleDay.hours.length -1) {
													console.log('aggiungo nuovo')
													singleDay.hours.push(
														{
															name: hour,
															items: 1,
														}
													)
													
													singleMonth.items ++;
													singleYear.items ++;
												}
												console.log(singleHour, hour)
											}
										}
										else if(singleDay.name != day && n == singleMonth.days.length -1){
											singleMonth.days.push(
												{
													name:day,
													items: 1,
													hours: [
														{
															name: hour,
															items: 1,
														}
													]
												}
											)
										}
									}
								}
								else if(singleMonth.name != month && b == singleYear.months.length -1){
									singleYear.months.push(
										{
											name: month,
											items: 1,
											days: [
												{
													name:day,
													items: 1,
													hours: [
														{
															name: hour,
															items: 1,
														}
													]
												}
											]
										}
									)
								}
							}
						}
						else if(singleYear.name != year && index  == years.length -1){
							console.log('ciclo finito, anno non presente, lo aggiungo e aumento counter')
							years.push({
								name: year,
								items: 1,
								months: [
									{
										name: month,
										items: 1,
										days: [
											{
												name:day,
												items: 1,
												hours: [
													{
														name: hour,
														items: 1,
													}
												]
											}
										]
									}
								],
							});
							arrayCounter++;
							break;
						}
					}
					
				}
			}
			console.log(years);
			console.log('----------');
			i++;
		}
	}
	console.log(totalMessages);
	return years;
};
const messageData = getMessageData(messagesArr);
const messageFilter = document.getElementById('message-select');
console.log(messageFilter)

function graphDataCreate(selectFilter, data, dataArray){
	console.log(selectFilter);
	let graphDataLabel = [];
	let graphDataNumbers = [];

	// Select filter 'YEAR'
	if (selectFilter.value == 'last-year') {
		graphDataLabel = [];
		graphDataNumbers = [];
		const date = new Date(Date.now()).getFullYear();
		console.log(date, data)
		for (let ind = 0; ind < data.length; ind++) {
			const element = data[ind];
			console.log(element.name, date, element.name == date)
			if (element.name == date) {
				for (let l = 0; l < element.months.length; l++) {
					const month = element.months[l];
					graphDataLabel.push(month.name)
					graphDataNumbers.push(month.items)
				}
			}
		}
	};

	// Select filter '6 months'
	if (selectFilter.value == 'last-6-months') {

		graphDataLabel = [];
		graphDataNumbers = [];
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

		for (let ind = 0; ind < data.length; ind++) {
			const element = data[ind];
			// take the current year obj
			if(element.name == now){

				console.log('anno ok',element)
				// prendo gli oggetti mesi precedenti al mese attuale i quali corrispondono
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
							graphDataLabel.push(singleMonth.name);
							graphDataNumbers.push(singleMonth.items);
						}
					}
				}
			}
		}
	};

	// Select filter '3 months'
	if (selectFilter.value == 'last-3-months') {

		graphDataLabel = [];
		graphDataNumbers = [];
		const date = new Date(Date.now()).getMonth();

		// Get the current month number and the 2 before   
		function getPreviousMonths(arr, numero) {
			const monthsResult = [];
			for (let i = 0; i < 3; i++) {
				const wrapAround = (arr.length + numero - i) % 12; // Calcola l'indice con wrap-around
				console.log(wrapAround)
				monthsResult.push(arr[wrapAround]);
			}
			return monthsResult;
		}
		const monthsArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
		const monthsResult = getPreviousMonths(monthsArray, date);

		const now = new Date(Date.now()).getFullYear();
		console.log('hello')

		for (let ind = 0; ind < data.length; ind++) {
			const element = data[ind];
			// take the current year obj
			if(element.name == now){

				console.log('year exist',element)

				// transform the months in the array 'monthsResult' from number to name
				let selectedMonths = [];
				for (let iter = 0; iter < 3; iter++) {

					let selectMonth = Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(`${monthsResult[iter]}`));
					selectedMonths.push(selectMonth);
				}
				console.log(selectedMonths)
				// for the current month and the 2 before
				for (let iter = 0; iter < 3; iter++) {
					const singleMonth = element.months[iter];
					console.log(singleMonth)
					// IF there is a message with the same month name put in array 'graphData'
					if(singleMonth != undefined){
						console.log('ingresso')
						if (selectedMonths.includes(singleMonth.name)) {
							graphDataLabel.push(singleMonth.name);
							graphDataNumbers.push(singleMonth.items);
							console.log(graphDataLabel, graphDataNumbers);
						}
					}
				}
			}
		}
	};

	// Select filter '7 days'
	if (selectFilter.value == 'last-week') {
		
		graphDataLabel = [];
		graphDataNumbers = [];
		const now = new Date();
		console.log('oggi', now)
		
		const weekDays = 7;
		const last7Days = [];

		// Get previous days individually and put them in array  
		for (let i = 0; i < weekDays; i++) {
			let previousDay = new Date(now);
			previousDay.setDate(now.getDate() - i);
			previousDay = previousDay.getDate();
			last7Days.push(previousDay);
		}
		console.log(last7Days);

		for (let ind = 0; ind < data.length; ind++) {
			const year = data[ind];
			console.log(year.name, now.getFullYear())
			// take the current year
			if(year.name == now.getFullYear()){

				let selectMonth = new Date(now).toLocaleString('en', {month:'long'});
				console.log(selectMonth)

				// Loop to check if in messages there is any with current month
				for (let iter = 0; iter < year.months.length; iter++) {
					const singleMonth = year.months[iter];
					console.log('month', singleMonth.name)

					// IF there is a message with the same month name
					if(singleMonth.name == selectMonth){
						console.log('esiste')
						for (let it = 0; it < singleMonth.days.length; it++) {
							const day = singleMonth.days[it];
							console.log(day.name, last7Days)

							// Check if there is any messages with same day as the ones in 'last7days'
							if (last7Days.includes(Number(day.name))) {
								console.log('include')
								graphDataLabel.push(day.name);
								graphDataNumbers.push(day.items);

							}
						}
					}
				}
			}
		}
	}

	// Select filter '24 hours'
	if (selectFilter.value == 'last-day') {
		
		graphDataLabel = [];
		graphDataNumbers = [];
		const now = new Date();
		console.log('oggi', now)
		
		for (let ind = 0; ind < data.length; ind++) {
			const year = data[ind];
			console.log('prova', year.name,now.getFullYear())
			// take the current year
			if(year.name == now.getFullYear()){

				let selectMonth = new Date(now).toLocaleString('en', {month:'long'});
				console.log(selectMonth)

				// Loop to check if in messages there is any with current month
				for (let iter = 0; iter < year.months.length; iter++) {
					const singleMonth = year.months[iter];
					console.log('month', singleMonth.name)

					// IF there is a message with the same month name
					if(singleMonth.name == selectMonth){
						console.log('esiste')
						for (let it = 0; it < singleMonth.days.length; it++) {
							const day = singleMonth.days[it];
							console.log(day.name, now.getDate(), now.getDate() -1)

							// Check if the message day is the same as today
							if (day.name == now.getDate() || day.name == now.getDate() -1) {
								
								for (let loopIndex = 0; loopIndex < day.hours.length; loopIndex++) {
									const hour = day.hours[loopIndex];
									let dataMs = new Date(dataArray[loopIndex].created_at).getTime();

									if (dataMs > (now.getTime() - (24*60*60*1000)) && dataMs < now.getTime()) {
										graphDataLabel.push(hour.name);
										graphDataNumbers.push(hour.items)
									}
								}
							}
						}
					}
				}
			}
		}
	}
	console.log(graphDataLabel, graphDataNumbers)
	return [graphDataLabel, graphDataNumbers];
}
let messagesGraph;
let messageGraphData = graphDataCreate(messageFilter, messageData, messagesArr);

messageFilter.addEventListener('change', () => {
	messageGraphData = graphDataCreate(messageFilter, messageData, messagesArr);

	if(messagesGraph != undefined){
		messagesGraph.destroy();
		console.log('result', messageGraphData[0], messageGraphData[0] != '' && messageGraphData[1] != '')

		if (messageGraphData[0] != '' && messageGraphData[1] != '') {
			console.log('IF')
			document.getElementById('messages-wrapper').classList.remove('hidden');
			document.getElementById('mess-no-data').classList.add('hidden');
			messagesGraph =	new Chart(
				document.getElementById('messages'),
				{
					type: 'bar',
					data: {
						labels: messageGraphData[0],
						datasets: [
							{
								label: 'Messaggi ricevuti',
								data: messageGraphData[1],
								backgroundColor: '#1dbf73',
							}
						],
					},
					options: {
						plugins: {
							legend: {
								labels: {
									// This more specific font property overrides the global property
									font: {
										size: 16
									}
								}
							}
						}
					}
				}
			);
		}
		else{
			console.log('ELSE')
			document.getElementById('messages-wrapper').classList.add('hidden');
			document.getElementById('mess-no-data').classList.remove('hidden');
		}
	}
	else{
		document.getElementById('messages-wrapper').classList.add('hidden');
		document.getElementById('mess-no-data').classList.remove('hidden');
		messagesGraph =	new Chart(
			document.getElementById('messages'),
			{
				type: 'bar',
				data: {
					labels: messageGraphData[0],
					datasets: [
						{
							label: 'Media messaggi ricevuti per anno',
							data: messageGraphData[1],
							backgroundColor: '#1dbf73',
						}
					],
				}
			}
		);
	}
	
});

//Messages Chart
if (messageGraphData != undefined && messageGraphData != null && messageGraphData != '') {
	console.log('standard chart')
	document.getElementById('messages-wrapper').classList.remove('hidden');
	document.getElementById('mess-no-data').classList.add('hidden');
	messagesGraph =	new Chart(
		document.getElementById('messages'),
		{
			type: 'bar',
			data: {
				labels: messageGraphData[0],
				datasets: [
					{
						label: 'Messaggi ricevuti',
						data: messageGraphData[1],
						backgroundColor: '#1dbf73',
					}
				],
			},
			options: {
				plugins: {
					legend: {
						labels: {
							// This more specific font property overrides the global property
							font: {
								size: 16
							}
						}
					}
				}
			}
		}
	);
}
else{
	console.log('no data standard chart')
	document.getElementById('messages-wrapper').classList.add('hidden');
	document.getElementById('mess-no-data').classList.remove('hidden');
}
 
//---------------------------------------------
// Reviews 

function getRewiewsData(entity){
	const years = [
		{
			name: '',
			items: 0,
			average: 0,
			months: [
				{
					name: '',
					items: 0,
					average: 0,
					days: [
						{
							name:'',
							items: 0,
							average: 0,
							hours: [
								{
									name:'',
									items: 0,
									average: 0,
								}
							]
						}
					]
				}
			]
		}
	];
	let arrayCounter = 0;
	let year;
	let month;
	let day;
	let hour;
	let totalReviews = 0;

	let i = 0;
	while ( totalReviews < entity.length) {
		totalReviews = 0;
		for (let z = 0; z < years.length; z++) {
			const year = years[z];
			for (let x = 0; x < year.months.length; x++) {
				const month = year.months[x];
				for (let c = 0; c < month.days.length; c++) {
					const day = month.days[c];
					for (let v = 0; v < day.hours.length; v++) {
						const hour = day.hours[v];
						totalReviews ++;
						console.log('add')
					}
				}
			}
		} 
		console.log(years)
		console.log('recensioni in array',totalReviews ,'entità recensioni', entity.length);
		console.log('index',i,'counter', arrayCounter);
		const element = entity[i];
		console.log(element)
		
		if(element != undefined){
			year = new Date(element.created_at).getFullYear();
			month = new Date(element.created_at).toLocaleString('en', { month: 'long' });
			day = new Date(element.created_at).toLocaleString('en', { day: 'numeric' });
			hour + new Date(element.created_at).getHours();
			console.log(year, month, day, hour)
			
			const arrayYear = years[arrayCounter];
			if(arrayYear != undefined){console.log(arrayYear.name, year)};

			// IF the name of the first object in array 'years' is empty
			if (years[0].name == '') {
				console.log('inserisco il primo oggetto');
				years[0] = {
					name: year,
					items: 1,
					months: [
						{
							name: month,
							items: 1,
							days: [
								{
									name:day,
									items: 1,
									hours: [
										{
											name: hour,
											items: 1,
										}
									]
								}
							]
						}
					],
				};
				console.log('totale messaggi',totalReviews)
			}
			else{
				block1: for (let index = 0; index <= years.length; index++) {
					const singleYear = years[index];
					// IF exist more than one 'year' in 'years'
					if (singleYear != undefined){
						console.log('anno diverso da undefined', singleYear);
						// IF the name of the year in years is the same of the message year
						if (singleYear.name == year){
							console.log('nomi anno uguali')
							for (let b = 0; b < singleYear.months.length; b++) {
								const singleMonth = singleYear.months[b];

								if (singleMonth.name == month) {
									console.log('nomi mese uguali')
									for (let n = 0; n < singleMonth.days.length; n++) {
										const singleDay = singleMonth.days[n];

										if (singleDay.name == day ) {
											console.log('nomi giorno uguali')
											for (let m = 0; m < singleDay.hours.length; m++) {
												const singleHour = singleDay.hours[m];

												if (singleHour.name == hour) {
													console.log('ora uguale')
													singleHour.items ++;
													singleMonth.items ++;
													singleYear.items ++;

													singleHour.average = singleHour.items / 24;
													singleDay.average = singleDay.items / 7;
													singleMonth.average = singleMonth.items / 30;
													singleYear.average = singleYear.items / 365;

													break block1;
												}
												else if(singleHour.name != hour && m == singleDay.hours.length -1) {
													console.log('aggiungo nuovo')
													singleDay.hours.push(
														{
															name: hour,
															items: 1,
														}
													)
													
													singleMonth.items ++;
													singleYear.items ++;
												}
												console.log(singleHour, hour)
											}
										}
										else if(singleDay.name != day && n == singleMonth.days.length -1){
											singleMonth.days.push(
												{
													name:day,
													items: 1,
													hours: [
														{
															name: hour,
															items: 1,
														}
													]
												}
											)
										}
									}
								}
								else if(singleMonth.name != month && b == singleYear.months.length -1){
									singleYear.months.push(
										{
											name: month,
											items: 1,
											days: [
												{
													name:day,
													items: 1,
													hours: [
														{
															name: hour,
															items: 1,
														}
													]
												}
											]
										}
									)
								}
							}
						}
						else if(singleYear.name != year && index  == years.length -1){
							console.log('ciclo finito, anno non presente, lo aggiungo e aumento counter')
							years.push({
								name: year,
								items: 1,
								months: [
									{
										name: month,
										items: 1,
										days: [
											{
												name:day,
												items: 1,
												hours: [
													{
														name: hour,
														items: 1,
													}
												]
											}
										]
									}
								],
							});
							arrayCounter++;
							break;
						}
					}
					
				}
			}
			console.log(years);
			console.log('----------');
			i++;
		}
	}
	console.log(totalReviews);
	return years;
};

const reviewData = getRewiewsData(reviewsArr);
let reviewGraph;
const reviewFilter = document.getElementById('review-select');
console.log(reviewFilter.value)
let reviewsGraphData = graphDataCreate(reviewFilter, reviewData, reviewsArr);

reviewFilter.addEventListener('change', () => {
	reviewsGraphData = graphDataCreate(reviewFilter, reviewData, reviewsArr);
	console.log('cambio di stato')

	if(reviewGraph != undefined){
		reviewGraph.destroy();
		console.log('result', reviewsGraphData[0], reviewsGraphData[0] != '' && reviewsGraphData[1] != '')

		if (reviewsGraphData[0] != '' && reviewsGraphData[1] != '') {
			console.log('IF')
			document.getElementById('reviews-wrapper').classList.remove('hidden');
			document.getElementById('review-no-data').classList.add('hidden');
			reviewGraph = new Chart(
				document.getElementById('reviews'),
				{
					type: 'bar',
					data: {
						labels: reviewsGraphData[0],
						datasets: [
							{
								label: 'Recensioni ricevute',
								data: reviewsGraphData[1],
								backgroundColor: '#93C379',
							}
						],
					},
					options: {
						plugins: {
							legend: {
								labels: {
									// This more specific font property overrides the global property
									font: {
										size: 16
									}
								}
							}
						}
					}
				}
			);
		}
		else{
			console.log('ELSE')
			document.getElementById('reviews-wrapper').classList.add('hidden');
			document.getElementById('review-no-data').classList.remove('hidden');
		}
	}
	else{
		document.getElementById('reviews-wrapper').classList.add('hidden');
		document.getElementById('review-no-data').classList.remove('hidden');
		reviewGraph = new Chart(
			document.getElementById('reviews'),
			{
				type: 'bar',
				data: {
					labels: reviewsGraphData[0],
					datasets: [
						{
							label: 'Media messaggi ricevuti per anno',
							data: reviewsGraphData[1],
							backgroundColor: '#1dbf73',
						}
					],
				}
			}
		);
	}
	
});

// Reviews Chart
if (reviewsGraphData[0] != '' && reviewsGraphData[1] != '') {
	console.log('standard chart', reviewsGraphData)
	document.getElementById('reviews-wrapper').classList.remove('hidden');
	document.getElementById('review-no-data').classList.add('hidden');
	reviewGraph =	new Chart(
		document.getElementById('reviews'),
		{
			type: 'bar',
			data: {
				labels: reviewsGraphData[0],
				datasets: [
					{
						label: 'Recensioni ricevute',
						data: reviewsGraphData[1],
						backgroundColor: '#93C379',
					}
				],
			},
			options: {
				plugins: {
					legend: {
						labels: {
							// This more specific font property overrides the global property
							font: {
								size: 16
							}
						}
					}
				}
			}
		}
	);
}
else{
	console.log('no data standard chart')
	document.getElementById('reviews-wrapper').classList.add('hidden');
	document.getElementById('review-no-data').classList.remove('hidden');
}

//---------------------------------------------
// Votes

function getVotesData(entity){
	const years = [
		{
			name: '',
			items: 0,
			average: 0,
			months: [
				{
					name: '',
					items: 0,
					average: 0,
					days: [
						{
							name:'',
							items: 0,
							average: 0,
							hours: [
								{
									name:'',
									items: 0,
									average: 0,
								}
							]
						}
					]
				}
			]
		}
	];
	let arrayCounter = 0;
	let year;
	let month;
	let day;
	let hour;
	let totalVotes = 0;

	let i = 0;
	while ( totalVotes < entity.length) {
		totalVotes = 0;
		for (let z = 0; z < years.length; z++) {
			const year = years[z];
			console.log('add-1')
			for (let x = 0; x < year.months.length; x++) {
				const month = year.months[x];
				console.log('add-2')
				for (let c = 0; c < month.days.length; c++) {
					console.log('add-3')
					const day = month.days[c];
					for (let v = 0; v < day.hours.length; v++) {
						const hour = day.hours[v];
						totalVotes += hour.items;
						console.log('add', totalVotes)
					}
				}
			}
		}
		console.log(years)
		console.log('voti in array',totalVotes ,'entità voti', entity.length);
		console.log('index',i,'counter', arrayCounter);
		const element = entity[i];
		console.log(element)
		
		if(element != undefined){
			year = new Date(element.created_at).getFullYear();
			month = new Date(element.created_at).toLocaleString('en', { month: 'long' });
			day = new Date(element.created_at).toLocaleString('en', { day: 'numeric' });
			hour = new Date(element.created_at).getHours();
			console.log(year, month, day, hour)
			
			const arrayYear = years[arrayCounter];
			if(arrayYear != undefined){console.log(arrayYear.name, year)};

			// IF the name of the first object in array 'years' is empty
			if (years[0].name == '') {
				console.log('inserisco il primo oggetto');
				years[0] = {
					name: year,
					items: 1,
					months: [
						{
							name: month,
							items: 1,
							days: [
								{
									name:day,
									items: 1,
									hours: [
										{
											name: hour,
											items: 1,
										}
									]
								}
							]
						}
					],
				};
			}
			else{
				block1: for (let index = 0; index <= years.length; index++) {
					const singleYear = years[index];
					// IF exist more than one 'year' in 'years'
					if (singleYear != undefined){
						console.log('anno diverso da undefined', singleYear);
						// IF the name of the year in years is the same of the message year
						if (singleYear.name == year){
							console.log('nomi anno uguali')
							for (let b = 0; b < singleYear.months.length; b++) {
								const singleMonth = singleYear.months[b];
								if (singleMonth.name == month) {
									console.log('nomi mese uguali')
									for (let n = 0; n < singleMonth.days.length; n++) {
										const singleDay = singleMonth.days[n];

										if (singleDay.name == day ) {
											console.log('nomi giorno uguali')
											for (let m = 0; m < singleDay.hours.length; m++) {
												const singleHour = singleDay.hours[m];

												if (singleHour.name == hour) {
													console.log('ora uguale')
													singleHour.items ++;
													singleMonth.items ++;
													singleYear.items ++;

													singleHour.average = singleHour.items / 24;
													singleDay.average = singleDay.items / 7;
													singleMonth.average = singleMonth.items / 30;
													singleYear.average = singleYear.items / 365;

													break block1;
												}
												else if(singleHour.name != hour && m == singleDay.hours.length -1) {
													console.log('aggiungo nuovo')
													singleDay.hours.push(
														{
															name: hour,
															items: 1,
														}
													)
													
													singleMonth.items ++;
													singleYear.items ++;
												}
												console.log(singleHour, hour)
											}
										}
										else if(singleDay.name != day && n == singleMonth.days.length -1){
											singleMonth.days.push(
												{
													name:day,
													items: 1,
													hours: [
														{
															name: hour,
															items: 1,
														}
													]
												}
											)
										}
									}
								}
								else if(singleMonth.name != month && b == singleYear.months.length -1){
									singleYear.months.push(
										{
											name: month,
											items: 1,
											days: [
												{
													name:day,
													items: 1,
													hours: [
														{
															name: hour,
															items: 1,
														}
													]
												}
											]
										}
									)
								}
							}
						}
						else if(singleYear.name != year && index  == years.length -1){
							console.log('ciclo finito, anno non presente, lo aggiungo e aumento counter')
							years.push({
								name: year,
								items: 1,
								months: [
									{
										name: month,
										items: 1,
										days: [
											{
												name:day,
												items: 1,
												hours: [
													{
														name: hour,
														items: 1,
													}
												]
											}
										]
									}
								],
							});
							arrayCounter++;
							break;
						}
					}
				}
			}
			console.log(years);
			console.log('----------');
			i++;
		}
	}
	console.log(totalVotes);
	return years;
};

const votesData = getVotesData(votesArr);
console.log(votesData)
let votesGraph;
const votesFilter = document.getElementById('vote-select');
console.log(votesFilter.value)
let votesGraphData = graphDataCreate(votesFilter, votesData, votesArr);

votesFilter.addEventListener('change', () => {
	votesGraphData = graphDataCreate(votesFilter, votesData, votesArr);
	console.log('cambio di stato')

	if(votesGraph != undefined){
		votesGraph.destroy();
		console.log('result', votesGraphData[0], votesGraphData[0] != '' && votesGraphData[1] != '')

		if (votesGraphData[0] != '' && votesGraphData[1] != '') {
			console.log('IF')
			document.getElementById('votes-wrapper').classList.remove('hidden');
			document.getElementById('vote-no-data').classList.add('hidden');
			votesGraph = new Chart(
				document.getElementById('votes'),
				{
					type: 'bar',
					data: {
						labels: votesGraphData[0],
						datasets: [
							{
								label: 'Voti ricevuti',
								data: votesGraphData[1],
								backgroundColor: '#1A3B03',
							}
						],
					},
					options: {
						plugins: {
							legend: {
								labels: {
									// This more specific font property overrides the global property
									font: {
										size: 16
									}
								}
							}
						}
					}
				}
			);
		}
		else{
			console.log('ELSE')
			document.getElementById('votes-wrapper').classList.add('hidden');
			document.getElementById('vote-no-data').classList.remove('hidden');
		}
	}
	else{
		document.getElementById('votes-wrapper').classList.add('hidden');
		document.getElementById('vote-no-data').classList.remove('hidden');
		votesGraph = new Chart(
			document.getElementById('votes'),
			{
				type: 'bar',
				data: {
					labels: votesGraphData[0],
					datasets: [
						{
							label: 'Media messaggi ricevuti per anno',
							data: votesGraphData[1],
							backgroundColor: '#1A3B03',
						}
					],
				}
			}
		);
	}
	
});

// votes Chart
if (votesGraphData[0] != '' && votesGraphData[1] != '') {
	console.log('standard chart', votesGraphData)
	document.getElementById('votes-wrapper').classList.remove('hidden');
	document.getElementById('vote-no-data').classList.add('hidden');
	votesGraph =	new Chart(
		document.getElementById('votes'),
		{
			type: 'bar',
			data: {
				labels: votesGraphData[0],
				datasets: [
					{
						label: 'Voti ricevuti',
						data: votesGraphData[1],
						backgroundColor: '#1A3B03',
					}
				],
			},
			options: {
				plugins: {
					legend: {
						labels: {
							// This more specific font property overrides the global property
							font: {
								size: 16
							}
						}
					}
				}
			}
		}
	);
}
else{
	console.log('no data standard chart', votesGraphData)
	document.getElementById('votes-wrapper').classList.add('hidden');
	document.getElementById('vote-no-data').classList.remove('hidden');
}