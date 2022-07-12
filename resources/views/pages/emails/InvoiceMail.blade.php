<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice Mail</title>
        <style>
            body[yahoo] body{
                padding: 20px;
                font-family: sans-serif;
            }
            .text-bold {
                color: black;
                font-weight: 700;
            }
            .text-extra-bold {
                color: black;
                font-weight: 900;
            }
            body[yahoo].column-text {
                display: flex;
                flex-direction: column;
            }
            body[yahoo].row-text {
                display: flex;
                flex-direction: row;
            }
        </style>
    </head>
    <body yahoo>
        <h1>
            INVOICE SPP
        </h1>

        <table>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-bold">Student Name </p>
                        <p class="text-bold">Month</p>
                        <p class="text-bold">Year</p>
                        <p class="text-bold">Program </p>
                        <p class="text-bold">Level </p>
                        <p class="text-bold">Status </p>
                        <p class="text-bold">Price Amount </p>
                    </div>
                </td>
                <td>
                    <div class="column-text">
                        <p class="">: {{$data->student->name}}</p>
                        <p class="">:
                            @if ($data->month == 1)
                                January
                            @elseif ($data->month == 2)
                                February
                            @elseif ($data->month == 3)
                                March
                            @elseif ($data->month == 4)
                                April
                            @elseif ($data->month == 5)
                                May
                            @elseif ($data->month == 6)
                                June
                            @elseif ($data->month == 7)
                                July
                            @elseif ($data->month == 8)
                                August
                            @elseif ($data->month == 9)
                                September
                            @elseif ($data->month == 10)
                                October
                            @elseif ($data->month == 11)
                                November
                            @elseif ($data->month == 12)
                                December
                            @endif
                        </p>
                        <p class="">: {{$data->year}}</p>
                        <p class="">: {{$data->level->program->name}}</p>
                        <p class="">: {{$data->level->name}}</p>
                        <p class="">: {{$data->status}}</p>
                        <p class="">:
                          {{ $data->currency == 'USD' ? '$ '.$data->price: 'Rp '.number_format($data->price, 0, ',', ',') }}
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-bold">Total Payment </p>
                    </div>
                </td>
                <td>
                    <div class="column-text">
                        <p class="text-extra-bold">:
                          {{ $data->currency == 'USD' ? '$ '.$data->price: 'Rp '.number_format($data->price, 0, ',', ',') }}
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="button" style="padding: 0 20px 0 20px; font-size: 14px; font-weight: bold; font-family: sans-serif; text-align: center;" height="45">
                          <a style="text-decoration: none; color: #fff;" href="{{route('spp-payment', $data->id)}}">Pay Now</a>
                        </td>
                      </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
