<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fun English Course | Receipt</title>
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
      text-align: right;
      padding: 20px 30px;
      background-color: #1E3E97;
      color: #fff;
      margin: 0px;
    }
    .content{
      margin: 20px 60px;
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

    h1 {
      font-family: Arial, Helvetica, sans-serif;
    }

    #table2 {
      font-family: Arial, Helvetica, sans-serif;
      width: 100%;
    }

    #table2 td {
      text-transform: capitalize;
      color: #1E3E97;
      font-weight: bold;
    }

  </style>
</head>
<body>
  <div>
    <h1 style="padding-right: 64px; font-size: 40px">RECEIPT</h1>
  </div>
  <div class="content">
    <table style="width: 100%">
      <tr>
        <td>
          <img src="{{ public_path('/images/edge-logo.png') }}" style="height: 80px">
        </td>
        <td style="text-align: right">
          <img src="{{ public_path('/images/logo.png') }}" style="height: 80px">
        </td>
      </tr>
    </table>
    <div class="logo">
    </div>
    <div style="margin-top: 30px;">
      <h3 style="color: #1E3E97; padding-left: 2px">BILLED TO :</h3>
      <table id="table2">
        <tbody>
          <tr>
            <td>Parent's Name</td>
            <td>:</td>
            <td>{{  $data->student->parent }}</td>
            <td></td>
            <td>Receipt Number</td>
            <td>:</td>
            @php
                $num = (str_pad((int)$data->invoice->numberInv , 8, '0', STR_PAD_LEFT));
            @endphp
            <td>RCPT-{{ $data->invoice->dateCode.$num }}</td>
          </tr>
          <tr>
            <td>Student's Name</td>
            <td>:</td>
            <td>{{  $data->student->name }}</td>
            <td></td>
            <td>Receipt Date</td>
            <td>:</td>
            <td>{{ $data->created_at->format('d-m-Y') }}</td>
          </tr>
          <tr>
            <td>City of Residence</td>
            <td>:</td>
            <td>{{  $data->student->city }}</td>
            <td></td>
            {{-- <td>Due Date</td>
            <td>:</td>
            <td>-</td> --}}
          </tr>
          <tr>
            <td>Country of Residence</td>
            <td>:</td>
            <td colspan="4">{{  $data->student->country }}</td>
          </tr>
          <tr>
            <td>Email Address</td>
            <td>:</td>
            <td colspan="4" style="text-transform: none">{{  $data->student->email }}</td>
          </tr>
        </tbody>
      </table>
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
          <td>{{ $data->level->program->name.' - '.$data->level->name }}</td>
          <td>-</td>
          <td>
            {{ $data->currency == 'USD' ? '$'.$data->price: 'Rp. '.number_format($data->price, 0, ',', ',') }}
          </td>
          <td>1</td>
          <td>
            {{ $data->currency == 'USD' ? '$'.$data->price: 'Rp. '.number_format($data->price, 0, ',', ',') }}
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th>Total</th>
          <th>
            {{ $data->currency == 'USD' ? '$'.$data->price: 'Rp. '.number_format($data->price, 0, ',', ',') }}
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
</body>
</html>
