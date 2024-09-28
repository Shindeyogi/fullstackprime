<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }

        .card {
            max-width: 500px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #006aff;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div>
        <h2>Event</h2>
    </div>
    <div class="card">
        <form action="bootcamp.php" method="post" enctype="multipart/form-data" class="p-3" onsubmit="return validateForm()">
            <label for="event_name">Name of the event :</label>
            <input type="text" id="event_name" name="event_name" class="form-control" required>
            <label for="image">Select Image:</label>
            <input type="file" id="event_image" name="event_image" accept="image/*" required>
            <label for="event_contact_number">Contact Number :</label>
            <input type="text" class="form-control" id="event_contact" name="event_contact" placeholder="Enter your Contact" required>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" class="form-control" required>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
            <label for="event_time">Time :</label>
            <input type="time" id="event_time" name="event_time" class="form-control" required>
            <input type="submit" value="Submit" class="btn btn-success mt-3">
        </form>
    </div>
    <script>
        function validateForm() {
            var eventName = document.getElementById("event_name").value;
            var location = document.getElementById("location").value;
            var contactNumber = document.getElementById("event_contact").value;

            // Regular expression to allow only characters
            var nameRegex = /^[A-Za-z\s]+$/;

            // Regular expression to allow only 10 digits for contact number
            var contactRegex = /^\d{10}$/;

            // Check if eventName contains only characters
            if (!nameRegex.test(eventName)) {
                alert("Please enter only characters in the Name of the event field.");
                return false;
            }

            // Check if location contains only characters
            if (!nameRegex.test(location)) {
                alert("Please enter only characters in the Location field.");
                return false;
            }

            // Check if contactNumber contains exactly 10 digits
            if (!contactRegex.test(contactNumber)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }

            return true; // Form submission allowed if all validations pass
        }
    </script>
</body>

</html>
