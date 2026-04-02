<style>
    body {
        font-family: 'Arial', sans-serif; /* Use a font that supports the peso sign */
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .header h1 {
        margin: 0;
        color: #4f83cc;
        font-size: 24px;
    }
    .header p {
        margin: 5px 0;
        color: #555;
    }
    .details-table,
    .summary-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .details-table th,
    .summary-table th {
        text-align: left;
        background-color: #f4f4f4;
        padding: 8px;
    }
    .details-table td,
    .summary-table td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    .details-table td {
        text-align: right;
    }
    .summary-table td {
        text-align: right;
        font-weight: bold;
    }
    .footer {
        text-align: center;
        margin-top: 30px;
        color: #555;
        font-size: 12px;
    }
    .footer a {
        color: #4f83cc;
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="header">
        <h1>Attendance Summary Report</h1>
        <p>Month: {{$month_name}}</p>
        <p>Employee Name: {{$name}}</p>
    </div>

    <!-- Salary Breakdown Table -->
    <table class="details-table">
        <!-- <tr>
            <th colspan="2">Salary Breakdown</th>
        </tr> -->
        <thead>
            <th>Days Present</th>
            <th>Days Absent</th>
            <th>Late Minutes</th>
            <th>Undertime Minutes</th>
            <th>Total Late/Undertime Minutes</th>
            <th>Total Hours</th>
        </thead>

        <tbody>
            <tr>
                <td>{{$days_present}}</td>
                <td>{{$days_absent}}</td>
                <td>{{$minutes_late}}</td>
                <td>0</td>
                <td>{{$minutes_late}}</td>
                <td>{{$total_hours}}</td>
            </tr>
        </tbody>
    </table>

    <!-- Salary Summary Table -->
    

    <div class="footer">
        <p>For inquiries, please contact HR at hr@company.com</p>
    </div>
</div>