import Chart from 'chart.js/auto';

Chart.defaults.color = '#ffffff';


const messLength = messagesArr.length;
console.log('Messages: ', messagesArr);

const votesLength = votesArr.length;
console.log('Votes: ', votesArr);

const reviewsLength = reviewsArr.length;
console.log('Reviews: ', reviewsArr);


function getData(entity){
	const years = [];
	const months = [];

	let yearCounter = 2;
	let monthCounter = 2;

	// Iteration counter - 1
	let iYCounter = 0;
	let iMCounter = 0;

	for (let i = 0; i < entity.length; i++) {
		const element = entity[i];
		const year = new Date(element.created_at).getFullYear();
		const month = new Date(element.created_at).toLocaleString('default', { month: 'long' });
		
		if(years.length == 0){
			years.push({
				name : year,
				elementTot : 1,
			});
		}
		else{
			let prevObjYear = Object.values( years[iYCounter]);
			if (prevObjYear.includes(year)) {
				years[iYCounter] = {
					name : year,
					elementTot : yearCounter ++,
				};
			}
			else{
				years.push({
					name : year,
					elementTot : 1,
				});
				iYCounter ++;
				console.log('iYCounter', iYCounter);
			}
		}

		if(months.length == 0){
			months.push({
				name : month,
				elementTot : 1,
			});
		}
		else{
			let prevObjMonth = Object.values(months[iMCounter]);
			if (prevObjMonth.includes(month)) {
				months[iMCounter] = {
					name : month,
					elementTot : monthCounter ++,
				};
			}
			else{
				months.push({
					name : month,
					elementTot : 1,
				});
				iMCounter ++;
				console.log('iMCounter', iMCounter);
			}
		}
	};
	let average;
	years.forEach(singleYear => {
		average = singleYear.elementTot / 12;
		console.log('Year average: ', average)
	});
	return [years, months, average];
};
getData(messagesArr);
getData(reviewsArr);
getData(votesArr);

console.log(getData(messagesArr))

const messageData = getData(messagesArr);

// Media messaggi anno
new Chart(
	document.getElementById('messages-year'),
	{
		type: 'bar',
		data: {
			labels: messageData[0].map(row => row.name),
			datasets: [
				{
					label: 'Media messaggi ricevuti per anno',
					data: messageData[0].map(row => row.elementTot),
					backgroundColor: '#1dbf73',
				}
			],
			
		}
	}
);

// Media Messaggi mese
new Chart(
	document.getElementById('messages-month'),
	{
		type: 'bar',
		data: {
			labels: messageData[1].map(row => row.name),
			datasets: [
				{
					label: 'Media messaggi ricevuti per mese',
					data: messageData[1].map(row => row.elementTot),
					backgroundColor: '#1dbf73',
				}
			]
		}
	}
);

const votesData = getData(votesArr);

// Media voti anno
new Chart(
	document.getElementById('votes-year'),
	{
		type: 'bar',
		data: {
			labels: votesData[0].map(row => row.name),
			datasets: [
				{
					label: 'Media voti ricevuti per anno',
					data: votesData[0].map(row => row.elementTot),
					backgroundColor: '#1dbf73',
				}
			]
		}
	}
);

// Media voti mese
new Chart(
	document.getElementById('votes-month'),
	{
		type: 'bar',
		data: {
			labels: votesData[1].map(row => row.name),
			datasets: [
				{
					label: 'Media voti ricevuti per mese',
					data: votesData[1].map(row => row.elementTot),
					backgroundColor: '#1dbf73',
				}
			]
		}
	}
);

const reviewsData = getData(reviewsArr);

// Media recensioni anno
new Chart(
	document.getElementById('reviews-year'),
	{
		type: 'bar',
		data: {
			labels: reviewsData[0].map(row => row.name),
			datasets: [
				{
					label: 'Media recensioni ricevute per anno',
					data: reviewsData[0].map(row => row.elementTot),
					backgroundColor: '#1dbf73',
				}
			]
		}
	}
);

// Media recensioni mese
new Chart(
	document.getElementById('reviews-month'),
	{
		type: 'bar',
		data: {
			labels: reviewsData[1].map(row => row.name),
			datasets: [
				{
					label: 'Media recensioni ricevute per mese',
					data: reviewsData[1].map(row => row.elementTot),
					backgroundColor: '#1dbf73',
				}
			]
		}
	}
);