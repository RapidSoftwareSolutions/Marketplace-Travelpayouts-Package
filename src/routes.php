<?php
$routes = [
    'metadata',
    'flightPriceHistory',
    'getPricesForMonth',
    'getPricesForAlternativeDirections',
    'getCheapestTickets',
    'getCheapestTicketsGroupedByMonth',
    'getNonStopTickets',
    'getFlightPriceTrends',
    'getPopulaAirlinesRoutes',
    'getWeekPrices',
    'getPopularDestinations',
    'getCountriesList',
    'getCitiesList',
    'getAirportsList',
    'getAirlinesList',
    'getAllianceList',
    'getAirplanesList',
    'getUserDefinitionByIp',
    'getEchangeRate',
    'getSpecialOffers'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

