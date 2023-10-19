
const buySection = document.getElementById('buy-section');

const tier1Btn = document.getElementById('1');
const tier2Btn = document.getElementById('2');
const tier3Btn = document.getElementById('3');

let selectedTier = '';
let selectedTierPrice = '';

tier1Btn.addEventListener('click',
    function(){
        buySection.classList.toggle('hidden');
        document.getElementById('check-out-tier').value = 'Tier 1';
        selectedTier = 'Tier 1';
        document.getElementById('check-out-price').value = '2.99 €';
        selectedTierPrice = '2.99';
    });

tier2Btn.addEventListener('click',
    function(){
        buySection.classList.toggle('hidden');
        document.getElementById('check-out-tier').value = 'Tier 2';
        selectedTier = 'Tier 2';
        document.getElementById('check-out-price').value = '5.99 €';
        selectedTierPrice = '5.99';
    });

tier3Btn.addEventListener('click',
    function(){
        buySection.classList.toggle('hidden');
        document.getElementById('check-out-tier').value = 'Tier 3';
        selectedTier = 'Tier 3';
        document.getElementById('check-out-price').value = '9.99 €';
        selectedTierPrice = '9.99';
    });