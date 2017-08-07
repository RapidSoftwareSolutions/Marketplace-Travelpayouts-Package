[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Travelpayouts/functions?utm_source=RapidAPIGitHub_TravelpayoutsFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Travelpayouts Package
Travelpayouts Data API – the way to get travel insights for your site or blog. Get flight price trends and find popular destinations for your customers.
* Domain: [travelpayouts.com](https://www.travelpayouts.com/)
* Credentials: token

## How to get credentials: 
1. Sign in [travelpayouts](https://www.travelpayouts.com).
2. Navigate to [developers page](https://www.travelpayouts.com/developers/api).

## Custom datatypes:
  |Datatype|Description|Example
  |--------|-----------|----------
  |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
  |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
  |List|Simple array|```["123", "sample"]```
  |Select|String with predefined values|```sample```
  |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## Travelpayouts.flightPriceHistory
Brings back the list of prices found by our users during the most recent 48 hours according to the filters used.

| Field            | Type       | Description
|------------------|------------|----------
| token            | credentials| Individual affiliate token.
| currency         | String     | The airline ticket’s The default value - RUB.
| origin           | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination      | String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| beginningOfPeriod| String     | The beginning of the period, within which the dates of departure fall (in the YYYY-MM-DD format, for example, 2016-05-01). Must be specified if period_type is equal to month.
| periodType       | Select     | The period for which the tickets have been found.
| oneWay           | Boolean    | true - one way, false - back-to-back. The default value - false.
| page             | Number     | A page number. The default value - 1.
| limit            | Number     | The total number of records on a page. The default value - 30. The maximum value - 1000.
| showToAffiliates | Boolean    | false - all the prices, true - just the prices, found using the partner marker (recommended). The default value - true.
| sorting          | Select     | The assorting of prices.
| tripDuration     | String     | The length of stay in weeks or days (for period_type=day).

## Travelpayouts.getPricesForMonth
Brings back the prices for each day of a month, grouped together by number of transfers.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Individual affiliate token.
| currency        | String     | The airline ticket’s The default value - RUB.
| origin          | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination     | String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| month           | DatePicker | The beginning of the month in the YYYY-MM-DD format.
| showToAffiliates| Boolean    | false - all the prices, true - just the prices, found using the partner marker (recommended). The default value - true.

## Travelpayouts.getPricesForAlternativeDirections
Brings back the prices for the directions between the nearest to the target cities.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Individual affiliate token.
| currency        | String     | The airline ticket’s The default value - RUB.
| origin          | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination     | String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| limit           | Number     | The number of variants entered, from 1 to 20, where 1 is just the variant with the specified points of departure and the points of destination.
| showToAffiliates| Boolean    | false - all the prices, true - just the prices, found using the partner marker (recommended). The default value - true.
| departDate      | DatePicker | Month of departure (yyyy-mm).
| returnDate      | DatePicker | Month of return (yyyy-mm).
| flexibility     | String     |  expansion of the range of dates upward or downward. The value may vary from 0 to 7, where 0 shall show the variants for the dates specified and 7 shall show all the variants found for a week prior to the specified dates and a week after.
| distance        | String     | The number of variants entered, from 1 to 20, where 1 is just the variant with the specified points of departure and the points of destination.

## Travelpayouts.getCheapestTickets
Returns the cheapest non-stop tickets, as well as tickets with 1 or 2 stops, for the selected route with departure/return date filters.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Individual affiliate token.
| currency        | String     | The airline ticket’s The default value - RUB.
| origin          | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination     | String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| limit           | Number     | The number of variants entered, from 1 to 20, where 1 is just the variant with the specified points of departure and the points of destination.
| showToAffiliates| Boolean    | false - all the prices, true - just the prices, found using the partner marker (recommended). The default value - true.
| departDate      | DatePicker | Month of departure (yyyy-mm).
| returnDate      | DatePicker | Month of return (yyyy-mm).
| flexibility     | String     |  expansion of the range of dates upward or downward. The value may vary from 0 to 7, where 0 shall show the variants for the dates specified and 7 shall show all the variants found for a week prior to the specified dates and a week after.
| distance        | String     | The number of variants entered, from 1 to 20, where 1 is just the variant with the specified points of departure and the points of destination.
| page            | Number     | Display the found data (by default the page displays 100 found prices. If the destination isn't selected, there can be more data. In this case, use the page, to display the next set of data, for example, page=2).

## Travelpayouts.getCheapestTicketsGroupedByMonth
Returns the cheapest non-stop tickets, as well as tickets with 1 or 2 stops, for the selected route grouped by month.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Individual affiliate token.
| currency   | String     | The airline ticket’s The default value - RUB.
| origin     | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination| String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.

## Travelpayouts.getNonStopTickets
Returns the cheapest non-stop ticket for the selected route with departure/return date filters.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Individual affiliate token.
| currency   | String     | The airline ticket’s The default value - RUB.
| origin     | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination| String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| departDate | DatePicker | Month of departure (yyyy-mm).
| returnDate | DatePicker | Month of return (yyyy-mm).

## Travelpayouts.getFlightPriceTrends
Returns the cheapest non-stop, one-stop, and two-stop flights for the selected route for each day of the selected month.

| Field       | Type       | Description
|-------------|------------|----------
| token       | credentials| Individual affiliate token.
| origin      | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination | String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| departDate  | DatePicker | Month of departure (yyyy-mm).
| returnDate  | DatePicker | Month of return (yyyy-mm).
| calendarType| String     | Field used to build the calendar. Equal to either: departure_date or return_date
| length      | String     | Length of stay in the destination city.
| currency    | String     | The airline ticket’s The default value - RUB.

## Travelpayouts.getPopulaAirlinesRoutes
Returns routes for which an airline operates flights, sorted by popularity.

| Field      | Type       | Description
|------------|------------|----------
| token      | credentials| Individual affiliate token.
| airlineCode| String     | IATA code of airline.
| limit      | Number     | Records limit per page. Default value is 100. Not less than 1000.

## Travelpayouts.getWeekPrices
Brings back the prices for the nearest dates to the target ones.

| Field           | Type       | Description
|-----------------|------------|----------
| token           | credentials| Individual affiliate token.
| currency        | String     | The airline ticket’s The default value - RUB.
| origin          | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.
| destination     | String     | The point of destination. The IATA city code or the country code. The length - from 2 to 3 symbols.
| showToAffiliates| Boolean    | false - all the prices, true - just the prices, found using the partner marker (recommended). The default value - true.
| departDate      | DatePicker | Month of departure (yyyy-mm).
| returnDate      | DatePicker | Month of return (yyyy-mm).

## Travelpayouts.getPopularDestinations
Brings back the most popular directions from a specified city.

| Field   | Type       | Description
|---------|------------|----------
| token   | credentials| Individual affiliate token.
| currency| String     | The airline ticket’s The default value - RUB.
| origin  | String     | The point of departure. The IATA city code or the country code. The length - from 2 to 3 symbols.

## Travelpayouts.getCountriesList
Returns a file with a list of countries from the database. 

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.

## Travelpayouts.getCitiesList
Returns a file with a list of cities from the database. 

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.

## Travelpayouts.getAirportsList
Returns a file with a list of airports from the database. 

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.

## Travelpayouts.getAirlinesList
Returns a file with a list of airlines from the database. 

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.

## Travelpayouts.getAllianceList
Returns a file with a list of alliances from the database. 

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.

## Travelpayouts.getAirplanesList
Returns a file with a list of airplanes from the database. 

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.


## Travelpayouts.getUserDefinitionByIp
Returns the IATA code and the name of the city nearest to the user.

| Field   | Type  | Description
|---------|-------|----------
| locale  | Select| The language in which the name of the city is returned (available languages: en, ru, de, fr, it, pl, th. By default, it is Russian)
| callback| String| Specifies the name of the function that contains a response to a query (mandatory).
| ip      | String| IP addresses of the users (if the address is not passed, the system determines the IP from the header of the request).

## Travelpayouts.getEchangeRate
Brings back the current rate of all popular currencies to RUB.

No arguments.

## Travelpayouts.getSpecialOffers
Brings back the recent special offers from the airline companies.

| Field| Type       | Description
|------|------------|----------
| token| credentials| Individual affiliate token.

