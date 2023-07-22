// cameroon-map.svg
// Define the cities
var cities = [
    { name: "Yaoundé", lat: 3.8667, long: 11.5167, color: "#ff040c" },
    { name: "Douala", lat: 4.0503, long: 9.7, color: "#ff040c" },
    { name: "Garoua", lat: 9.3, long: 13.4, color: "#ff040c" },
    { name: "Bamenda", lat: 5.95, long: 10.15, color: "#ff040c" },
    { name: "Bafoussam", lat: 5.4667, long: 10.4167, color: "#ff040c" },
    { name: "Ngaoundéré", lat: 7.3167, long: 13.5833, color: "#ff040c" },
    { name: "Bertoua", lat: 4.5833, long: 13.6833, color: "#ff040c" },
    { name: "Ebolowa", lat: 2.9, long: 11.15, color: "#ff040c" },
    { name: "Maroua", lat: 10.5953, long: 14.3247, color: "#ff040c" },
    { name: "Buea", lat: 4.1558, long: 9.2319, color: "#ff040c" },
];

// Define the projection
var projection = d3
    .geoMercator()
    .center([12.5, 5.5])
    .scale(2000)
    .translate([500, 500]);

// Load the Cameroon map
d3.xml("/storage/images/cameroon-map.svg").then(function (data) {
    // Append the SVG map to the HTML page
    var svg = d3.select("#map").node().append(data.documentElement);

    // Create a group for each city and append a circle to represent the dot
    var groups = svg
        .selectAll("g")
        .data(cities)
        .enter()
        .append("g")
        .attr("class", "city");

    groups
        .append("circle")
        .attr("cx", function (d) {
            return projection([d.long, d.lat])[0];
        })
        .attr("cy", function (d) {
            return projection([d.long, d.lat])[1];
        })
        .attr("r", 6)
        .attr("fill", function (d) {
            return d.color;
        });
});
