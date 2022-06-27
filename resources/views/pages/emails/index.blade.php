<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Banyak</title>
        <style>
            body{
                padding: 20px;
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
            Payment Successful
        </h1>

        <table>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-bold">Student Name </p>
                        <p class="text-bold">Parent Name</p>
                        <p class="text-bold">City </p>
                        <p class="text-bold">Country</p>
                        <p class="text-bold">Month</p>
                        <p class="text-bold">Program </p>
                        <p class="text-bold">Level </p>
                        <p class="text-bold">Status </p>
                        <p class="text-bold">Currency Code </p>
                        <p class="text-bold">Price Amount </p>
                    </div>
                </td>
                <td>
                    <div class="column-text">
                        <p class="">: {{$user->name}}</p>
                        <p class="">: {{$user->parent}}</p>
                        <p class="">: {{$user->city}}</p>
                        <p class="">: {{$user->country}}</p>
                        <p class="">:
                            @if ($student->month == 1)
                                January
                            @elseif ($student->month == 2)
                                February
                            @elseif ($student->month == 3)
                                March
                            @elseif ($student->month == 4)
                                April
                            @elseif ($student->month == 5)
                                May
                            @elseif ($student->month == 6)
                                June
                            @elseif ($student->month == 7)
                                July
                            @elseif ($student->month == 8)
                                August
                            @elseif ($student->month == 9)
                                September
                            @elseif ($student->month == 10)
                                October
                            @elseif ($student->month == 11)
                                November
                            @elseif ($student->month == 12)
                                December
                            @endif
                        </p>
                        <p class="">: {{$program->name}}</p>
                        <p class="">: {{$level->name}}</p>
                        <p class="">: {{$student->status}}</p>
                        <p class="">: {{'USD'}}</p>
                        <p class="">: {{'$'.$sppPayment->amount}}</p>
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
                        <p class="text-extra-bold">: {{'$'.$sppPayment->amount}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-bold">Thank You.</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="button" style="padding: 0 20px 0 20px; font-size: 14px; font-weight: bold; font-family: sans-serif; text-align: center;" height="45">
                          <a style="text-decoration: none; color: #fff;" href="{{route('receipt', $student->id)}}">Show Receipt</a>
                        </td>
                      </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
