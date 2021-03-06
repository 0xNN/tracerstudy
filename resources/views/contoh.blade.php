<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.5.min.css" />
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.5.min.js"></script>
</head>
<body>
    <div id="grid" style="width: 100%; height: 250px;"></div>
</body>
<script>
$(function () {
    $('#grid').w2grid({
        name: 'grid',
        header: 'List of Names',
        columns: [
            { field: 'fname', text: 'First Name', size: '30%' },
            { field: 'lname', text: 'Last Name', size: '30%' },
            { field: 'email', text: 'Email', size: '40%' },
            { field: 'sdate', text: 'Start Date', size: '120px' }
        ],
        records: [
            { recid: 1, fname: "Peter", lname: "Jeremia", email: 'peter@mail.com', sdate: '2/1/2010' },
            { recid: 2, fname: "Bruce", lname: "Wilkerson", email: 'bruce@mail.com', sdate: '6/1/2010' },
            { recid: 3, fname: "John", lname: "McAlister", email: 'john@mail.com', sdate: '1/16/2010' },
            { recid: 4, fname: "Ravi", lname: "Zacharies", email: 'ravi@mail.com', sdate: '3/13/2007' },
            { recid: 5, fname: "William", lname: "Dembski", email: 'will@mail.com', sdate: '9/30/2011' },
            { recid: 6, fname: "David", lname: "Peterson", email: 'david@mail.com', sdate: '4/5/2010' }
        ]
    });
});
</script>
</html>