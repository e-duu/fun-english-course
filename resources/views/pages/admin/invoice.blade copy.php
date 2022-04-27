<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fun English Course | Invoice</title>
  <style>
    @page { 
            margin: 0; 
            display: flex;
            align-items: center;
        }
    @font-face {
        font-family: "Roboto Slab", sans-serif;
        font-weight: 400;
        font-style: normal; 
        src: url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap') format("truetype");
    }
    h1 {
      text-align: end;
      padding: 20px 30px;
      background-color: #1E3E97;
      color: #fff;
    }
    .content{
      margin: 40px 100px;
    }
    .logo {
      display: flex;
      justify-content: space-between;
    }
    .flex{
      display: flex;
      justify-content: space-between;
    }
    p{
      color: #1E3E97;
      margin: 4px 0px;
      font-weight: bold;
    }
    #table, th, td {
      border: 1px solid #fff;
    }
    #table {
      margin-top: 50px;
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #table th {
      /* border: 1px solid #ddd; */
      padding: 8px;
      text-align: center;
      text-transform: uppercase;
    }

    #table td {
      padding: 8px;
      text-transform: capitalize;
      background-color: #DBEAFE;
    }

    #table tr:nth-child(even){background-color: #f2f2f2;}

    #table tr:hover {background-color: #ddd;}

    #table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #1E3E97;
      color: white;
    }
  </style>
</head>
<body>
  <div>
    <h1>INVOICE</h1>
  </div>
  <div class="content">
    <div class="logo">
      <img src="{{ public_path('/images/edge-logo.png') }}">
      <img src="{{ public_path('/images/logo.png') }}">
    </div>
    <div style="margin-top: 50px;">
      <h3 style="color: #1E3E97;">BILLED TO:</h3>
      <div class="flex">
        <p>Parent's Name :&nbsp;&nbsp; Abdurrahman Huaidi</p>
        <p>Invoice Number :&nbsp;&nbsp; INV-2020124556</p>
      </div>
      <div class="flex">
        <p>Student's Name :&nbsp;&nbsp; Ramadhan Tri Nurdias</p>
        <p>Invoice Date :&nbsp;&nbsp; 12 - 12 - 2021</p>
      </div>
      <div class="flex">
        <p>City of Residence :&nbsp;&nbsp; Jakarta</p>
        <p>Due Date :&nbsp;&nbsp; 19 - 19 - 19</p>
      </div>
      <p>Country of Residence :&nbsp;&nbsp; Indognesia</p>
      <p>Email Address :&nbsp;&nbsp; ramangart2@gmail.com</p>
    </div>
    <table id="table">
      <thead>
        <tr>
          <th>Program</th>
          <th>Description</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>   
        <tr>
          <td>Program</td>
          <td>Description</td>
          <td>Unit Price</td>
          <td>Quantity</td>
          <td>Amount</td>
        </tr>
      </tbody>
      <tfoot>   
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th>Total</th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</body>
</html>