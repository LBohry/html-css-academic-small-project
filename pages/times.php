<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Destination Page</title>
</head>

<body>
    <h1>Destinations</h1>

    <table id="destinationTable">
        <tr>
            <th rowspan="2">Destinations</th>
            <th colspan="2">Available Time for Travel</th>
        </tr>
        <tr>
            <th>Weekdays</th>
            <th>Weekends</th>
        </tr>

    </table>
    <script id="data" type="application/json">
        {
            "destinations": [
                {
                    "name": "Djerba",
                    "weekdays": "9:00 AM - 5:00 PM",
                    "weekends": "10:00 AM - 4:00 PM"
                },
                {
                    "name": "Hammamet",
                    "weekdays": "10:00 AM - 6:00 PM",
                    "weekends": "11:00 AM - 5:00 PM"
                },
                {
                    "name": "El Jem",
                    "weekdays": "9:00 AM - 5:00 PM",
                    "weekends": "10:00 AM - 4:00 PM"
                },
                {
                    "name": "Kairouan",
                    "weekdays": "10:00 AM - 6:00 PM",
                    "weekends": "11:00 AM - 5:00 PM"
                },
                {
                    "name": "Monastir",
                    "weekdays": "9:00 AM - 5:00 PM",
                    "weekends": "10:00 AM - 4:00 PM"
                },
                {
                    "name": "Sousse",
                    "weekdays": "10:00 AM - 6:00 PM",
                    "weekends": "11:00 AM - 5:00 PM"
                }
            ]
        }
    </script>
    <script>
        function loadDestinations() {
            var data = JSON.parse(document.getElementById('data').textContent);
            var table = document.querySelector('#destinationTable');

            data.destinations.forEach(destination => {
                var tr = document.createElement('tr');

                var tdName = document.createElement('td');
                tdName.textContent = destination.name;
                tr.appendChild(tdName);

                var tdWeekdays = document.createElement('td');
                tdWeekdays.textContent = destination.weekdays;
                tr.appendChild(tdWeekdays);

                var tdWeekends = document.createElement('td');
                tdWeekends.textContent = destination.weekends;
                tr.appendChild(tdWeekends);

                table.appendChild(tr);
            });
        }

        loadDestinations();
    </script>
</body>

</html>