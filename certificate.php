
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .certificate {
            width: 1000px;
            height: 700px;
            margin: 50px auto;
            background-image: url('https://i.pinimg.com/736x/d9/d5/40/d9d540b6f6d410419dcacfb568a50da9.jpg');
            background-size: cover;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: RED; /* Dark Blue */
            font-family: Algerian;
        }
        .recipient {
            font-size: 24px;
            margin-top: 20px;
        }
        
        .recipient h4 {
            margin: 10px 0;
            color: #009688; /* Teal */
        }
        .course {
            font-size: 18px;
            margin-top: 10px;
        }
        .institute {
            font-size: 18px;
            margin-top: 10px;
        }
        .date {
            font-size: 16px;
            margin-top: 20px;
        }
        .signature {
            margin-top: 40px;
        }
        .signature p {
            margin-bottom: 10px;
        }
        .signature h3 {
            color: black;
            font-family: Freestyle Script;
            font-size: 24px;
        }
        .seal {
            display: flex;
            margin-top: 20px;
            text-align: center;
        }
        .seal img {
            max-width: 150px;
        }
    </style>
    <!-- ... Your existing head content ... -->
    <script>
        // Fetch certificate data from the server
        fetch('certificate1.php')
            .then(response => response.json())
            .then(data => {
                // Populate certificate fields with fetched data
                document.getElementById('participantName').innerHTML = data.participantName;
                document.getElementById('courseName').innerHTML = data.courseName;
                document.getElementById('organizationName').innerHTML = data.organizationName;
                document.getElementById('date').innerHTML = data.date;
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</head>
<body>
    <div class="certificate">
        <!-- ... Your existing certificate content ... -->
        <div class="recipient">
            <p>This is to certify that</p>
            <p><h3 id="participantName"></h3></p>
        </div>
        <div class="course">
            <p>Has successfully completed the course on</p>
            <h3 id="courseName"></h3>
            <p>conducted by</p>
            <h4 id="organizationName"></h4>
        </div>
        <div class="date">
            <p id="date"></p>
        </div>
        <!-- ... Your existing certificate content ... -->
    </div>
</body>
</html>
