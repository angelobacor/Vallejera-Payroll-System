<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 900px;
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
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
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
        <h1>Employee Payslip</h1>
        <p>Period: {{$period}}</p>
        <p>Employee Name: {{$name}}</p>
    </div>

    <!-- Horizontal Salary Breakdown Table -->
    <!-- Horizontal Salary Breakdown Table -->
<table>
    <tr>
        <th>Salary Component</th>
        <th>Amount</th>
    </tr>
    <tr>
        <td>Salary</td>
        <td>{{$total_earning}}</td>
    </tr>
    <tr>
        <td><strong>Gross Salary</strong></td>
        <td><strong>{{$total_earning}}</strong></td>
    </tr>
</table>

<!-- Horizontal Deductions Table -->
<table>
    <tr>
        <th>Contributions</th>
        <th>Amount</th>
    </tr>
    <tr>
        <td>SSS</td>
        <td>{{$sss}}</td>
    </tr>
    <tr>
        <td>Pag-ibig</td>
        <td>{{$pagibig}}</td>
    </tr>
    <tr>
        <td>PhilHealth</td>
        <td>{{$philhealth}}</td>
    </tr>



    <tr>
        <th>Deductions</th>
        <th></th>
        <!-- <th>Total Deductions</th> -->
    </tr>
    <tr>
        <td>Tax Income</td>
        <td>{{$tax_income}}</td>
        <!-- <td>{{ number_format($tax_income, 2) }}</td> -->
    </tr>
    @if($deductions)
        @foreach($deductions as $deduction)
        <tr>
            <td>{{$deduction->deduction_name}}</td>
            <td>{{$deduction->amount/2}}</td>
            <!-- <td>{{ number_format($tax_income, 2) }}</td> -->
        </tr>
        @endforeach
    @endif

    <tr>
        <td><strong>Overall Deductions</strong></td>
        <td><strong>{{$total_deduction}}</strong></td>
        <!-- <td><strong>{{ number_format($sss + $pagibig + $philhealth + $tax_income, 2) }}</strong></td> -->
    </tr>
</table>

<!-- Salary Summary Table -->
<table>
    <tr>
        <th>Net Salary</th>
        <th>Amount</th>
        <!-- <th>Total Contribution</th> -->
    </tr>
    <tr>
        <td>Net Salary</td>
        <td>{{$net_salary}}</td>
        <!-- <td>{{ number_format($net_salary, 2) }}</td> -->
    </tr>
</table>

    <div class="footer">
        <p>For inquiries, please contact HR at hr@company.com</p>
    </div>
</div>
