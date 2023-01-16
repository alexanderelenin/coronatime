


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div style="margin-top:100px;">
        <div style="text-align: center;" >
            <img src="{{$message->embed(public_path() . '/images/email.png')}}" alt="">
        </div>
        <div style="text-align:center;">
            <h1 style="font-family: sans-serif;">{{__('texts.recover_password')}}</h1>
            <p style="font-family: sans-serif; margin-bottom: 20px">{{__('texts.click_this_button_to_recover_a_password')}}</p> 
            <a style="font-family: sans-serif; margin-top:40px; padding:15px; text-align:center; background-color:#0FBA68; border-radius:8px; border:none; color:white; width: 392px; height:56px; text-decoration:none;" 
                href="{{$url}}"
                >{{__('texts.submit_recover_password')}}
            </a> 
        </div>
     </div>
</body>
</html>
