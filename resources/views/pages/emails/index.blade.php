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
                        <p class="">:
                            @if ($sppMonth->month == 1)
                                January
                            @elseif ($sppMonth->month == 2)
                                February
                            @elseif ($sppMonth->month == 3)
                                March
                            @elseif ($sppMonth->month == 4)
                                April
                            @elseif ($sppMonth->month == 5)
                                May
                            @elseif ($sppMonth->month == 6)
                                June
                            @elseif ($sppMonth->month == 7)
                                July
                            @elseif ($sppMonth->month == 8)
                                August
                            @elseif ($sppMonth->month == 9)
                                September
                            @elseif ($sppMonth->month == 10)
                                October
                            @elseif ($sppMonth->month == 11)
                                November
                            @elseif ($sppMonth->month == 12)
                                December
                            @endif
                        </p>
                        <p class="">: {{$program->name}}</p>
                        <p class="">: {{$level->name}}</p>
                        <p class="">: {{$sppMonth->status}}</p>
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
        </table>
    </body>
</html>
