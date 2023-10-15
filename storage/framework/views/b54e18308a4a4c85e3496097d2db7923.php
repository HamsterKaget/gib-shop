
<?php
    use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap");
        body, p, h1 {
            margin: 0;
            padding: 0;
            font-family: "Open Sans", sans-serif;
        }
        .container {
            background: #e0e2e8;
            position: relative;
            width: 100%;
            height: 100vh;
        }
        .container .ticket {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .container .basic {
            display: none;
        }
        .airline {
            display: block;
            height: 625px;
            width: 285px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);
            border-radius: 25px;
            z-index: 3;
        }
        .airline .top {
            height: 220px;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo e(strpos($ticket->program->thumbnail, 'images/Thumbnail') === 0 ? asset($ticket->program->thumbnail) : Storage::url($ticket->program->thumbnail)); ?>');
            background-size: cover;
            background-position: center;
            border-top-right-radius: 25px;
            border-top-left-radius: 25px;
        }

        .airline .top h1 {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 2;
            text-align: center;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
        }
        .airline .bottom {
            height: 405px;
            background: #fff;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
        }
        .top .big {
            position: absolute;
            top: 100px;
            font-size: 65px;
            font-weight: 700;
            line-height: 0.8;
        }
        .top .big .from {
            color: #ffcc05;
            text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;
        }
        .top .big .to {
            position: absolute;
            left: 32px;
            font-size: 35px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .top .big .to i {
            margin-top: 5px;
            margin-right: 10px;
            font-size: 15px;
        }
        .top--side {
            position: absolute;
            right: 35px;
            top: 110px;
            text-align: right;
        }
        .top--side i {
            font-size: 25px;
            margin-bottom: 18px;
        }
        .top--side p {
            font-size: 10px;
            font-weight: 700;
        }
        .top--side p + p {
            margin-bottom: 8px;
        }
        .bottom p {
            display: flex;
            flex-direction: column;
            font-size: 13px;
            font-weight: 700;
        }
        .bottom p span {
            font-weight: 400;
            font-size: 11px;
            color: #6c6c6c;
        }
        .bottom .column {
            margin: 0 auto;
            width: 80%;
            padding: 2rem 0;
        }
        .bottom .row {
            display: flex;
            justify-content: space-between;
        }
        .bottom .row--right {
            text-align: right;
        }
        .bottom .row--center {
            text-align: center;
        }
        .bottom .row-2 {
            margin: 30px 0 60px 0;
            position: relative;
        }
        .bottom .row-2::after {
            content: "";
            position: absolute;
            width: 100%;
            bottom: -30px;
            left: 0;
            background: #000;
            height: 1px;
        }
        /* .bottom .bar--code {
            height: 50px;
            width: 80%;
            margin: 0 auto;
            position: relative;
        }
        .bottom .bar--code::after {
            content: "";
            position: absolute;
            width: 6px;
            height: 100%;
            background: #000;
            top: 0;
            left: 0;
            box-shadow: 10px 0 #000, 30px 0 #000, 40px 0 #000, 67px 0 #000, 90px 0 #000, 100px 0 #000, 180px 0 #000, 165px 0 #000, 200px 0 #000, 210px 0 #000, 135px 0 #000, 120px 0 #000;
        }
        .bottom .bar--code::before {
            content: "";
            position: absolute;
            width: 3px;
            height: 100%;
            background: #000;
            top: 0;
            left: 11px;
            box-shadow: 12px 0 #000, -4px 0 #000, 45px 0 #000, 65px 0 #000, 72px 0 #000, 78px 0 #000, 97px 0 #000, 150px 0 #000, 165px 0 #000, 180px 0 #000, 135px 0 #000, 120px 0 #000;
        } */
        .info {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 10px;
            font-size: 14px;
            text-align: center;
            z-index: 1;
        }
        .info a {
            text-decoration: none;
            color: #000;
            background: #ffcc05;
        }


    </style>
</head>
<body>
    <div class="container">

        <div class="ticket basic">
            <p>Admit One</p>
        </div>

        <div class="ticket airline">
            <div class="top">
                <div class="title-wrapper">
                    <h1><?php echo e($ticket->program->title); ?> PASS</h1>
                </div>
                
                
            </div>
            <div class="bottom">
                <div class="column">
                    <div class="row row-1">
                        <p><span>Program</span><?php echo e($ticket->program->title); ?></p>
                        <p><span>Ticket UUID</span><?php echo e($ticket->ticket_uuid); ?></p>
                    </div>
                    <div class="row row-2">
                        <p><span>Program Start</span><?php echo e(Carbon::parse($ticket->program->start_date)->isoFormat('D MMM, YY')); ?></p>
                        <p class="row--right"><span>Program End</span><?php echo e(Carbon::parse($ticket->program->end_date)->isoFormat('D MMM, YY')); ?></p>
                        
                    </div>
                    <div class="row row-2">
                        <p><span>Costumer</span><?php echo e($ticket->user->name); ?></p>
                        
                        <p class="row--right"><span>Total Seat</span><?php echo e(1); ?></p>
                    </div>
                    <div class="row row-3">
                        <p><span>Costumer</span><?php echo e($ticket->user->name); ?></p>
                        <p class="row--center"><span>Seat</span>11E</p>
                        <p class="row--right"><span>Total Seat</span><?php echo e(1); ?></p>
                    </div>

                </div>
                <div class="bar--code"></div>
            </div>
        </div>

    </div>
</body>
</html>
<?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/dashboard/ticket/detail.blade.php ENDPATH**/ ?>