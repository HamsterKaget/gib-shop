<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Ticket Detail</title>
    <style>
        body {
            background: #f0f0f0;
            font-size: 17px;
            display: flex;
            justify-items: center;
            align-items: center;
        }
        .container {
            display: flex;
            justify-items: center;
            align-items: center;
            max-width: 900px;
            width: 92%;
            margin: 50px auto 50px auto;
        }
        * {
            box-sizing: border-box;
        }
        .bp-card {
            position: relative;
        }
        .bp-card .bp-card_label {
            position: absolute;
            top: 30px;
            left: 0;
            bottom: 30px;
            width: 130px;
            background: white;
            cursor: pointer;
        }
        .bp-card .bp-card_label::before {
            content: '';
            background-color: transparent;
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/372262/ticket-top.svg');
            background-size: contain;
            background-repeat: no-repeat;
            width: 130px;
            height: 100px;
            position: absolute;
            top: -30px;
            left: 0;
        }
        .bp-card .bp-card_label::after {
            content: '';
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/372262/ticket-bottom.svg');
            background-size: contain;
            background-position: bottom left;
            background-repeat: no-repeat;
            width: 130px;
            height: 100px;
            position: absolute;
            bottom: -30px;
            left: 0;
        }
        .bp-card .bp-card_label .bd-border_dotted {
            content: '';
            width: 0px;
            border-right: 5px dashed #f0f0f0;
            height: 100%;
            position: absolute;
            top: 0;
            right: 40px;
        }
        .bp-card .bp-card_label .bd-border_solid {
            content: '';
            width: 3px;
            border-radius: 3px;
            background: #ffaf96;
            height: 100%;
            position: absolute;
            top: 0;
            left: calc(130px/3.1);
        }
        .bp-card .bp-card_content {
            position: relative;
            background: white;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            width: calc(100% - 130px);
            margin-left: calc(130px - 1px);
            padding: 35px;
        }
        .bp-card .bp-card_content h4 {
            font-size: 40px;
            margin: 0 140px 0 0;
        }
        .bp-card .bp-card_content p.secondary {
            color: #ffaf96;
            margin: 0;
            padding-top: 10px;
        }
        .bp-card .bp-card_content ul {
            list-style: none;
            margin: 50px 0 0 0;
            padding: 0;
        }
        .bp-card .bp-card_content ul span {
            display: block;
            color: #a8a8a8;
        }
        .bp-card .bp-card_content ul li {
            padding: 0;
            display: inline-block;
            padding-right: 30px;
        }
        .bp-card .bp-card_content a.price {
            color: #ffaf96;
            text-decoration: none;
            position: absolute;
            top: 35px;
            right: 35px;
            font-size: 36px;
            background: rgba(255, 175, 150, 0.1);
            padding: 10px;
            border-radius: 3px;
        }
        @media only screen and (max-width: 600px) {
            .bp-card {
                position: relative;
            }
            .bp-card .bp-card_label {
                top: 0;
                left: 0;
                bottom: 0;
                width: calc(100% - 40px);
                margin-left: 20px;
                height: 120px;
                position: relative;
            }
            .bp-card .bp-card_label:after, .bp-card .bp-card_label:before {
                transform: rotate(90deg);
                transform-origin: top left;
                width: 126px;
                top: -2px;
            }
            .bp-card .bp-card_label:after {
                left: 80px;
                right: auto;
            }
            .bp-card .bp-card_label:before {
                left: auto;
                right: -146px;
            }
            .bp-card .bp-card_label .bd-border_dotted {
                width: 100%;
                border-top: 4px dashed #f0f0f0;
                border-right: none;
                height: 4px;
                top: 92px;
                left: 0;
            }
            .bp-card .bp-card_label .bd-border_solid {
                width: 80%;
                background: #ffaf96;
                height: 3px;
                top: 45px;
                left: 10%;
            }
            .bp-card .bp-card_content {
                margin-left: 0;
                width: 100%;
                padding: 3% 5% 5% 5%;
            }
            .bp-card .bp-card_content h4 {
                font-size: 32px;
                margin: 0;
            }
            .bp-card .bp-card_content ul {
                list-style: none;
                margin: 20px 0 0 0;
                padding: 0;
            }
            .bp-card .bp-card_content ul span {
                display: block;
                color: #a8a8a8;
            }
            .bp-card .bp-card_content ul li {
                padding: 0;
                display: inline-block;
                width: 100%;
                padding-right: 30px;
                margin-bottom: 5px;
            }
            .bp-card .bp-card_content a.price {
                position: relative;
                width: 100%;
                display: block;
                margin: 0 auto;
                top: auto;
                right: auto;
                margin-top: 20px;
                text-align: center;
            }
            .bp-card .bp-card_content a.price:before {
                content: '';
                background: url('http://imgh.us/i-arrow.svg') center no-repeat;
                background-size: contain;
                position: absolute;
                right: 22px;
                top: 22px;
                width: 20px;
                height: 20px;
            }
        }


    </style>
</head>
<body>
{{-- @dd($ticket) --}}
<div class="container">

	<div class="bp-card" data-clickthrough="link">
		<div class="bp-card_label">
			<div class="bd-border_solid"></div>
			<div class="bd-border_dotted"></div>
		</div>
		<div class="bp-card_content">
			<p class="secondary">Ticket Pass</p>
			<h4>{{ $ticket->program->title }}</h4>


			<ul>
				<span>Including:</span>
					<li>
						Minimal 1
					</li>
					<li>
						Minimal 1
					</li>
					<li>
						Minimal 1
					</li>
			</ul>


		</div>
	</div>

</div>

</body>
</html>
