<html>
<head>
    <style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }
    .middle {
        margin-right: auto;
        margin-left: auto;
    }
</style>
</head>
<body>
<div class="card middle">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Avatar" style="width:100%">
    <div class="container">
        <h4 style="text-align: center; font-size: 32px;"><b>VDT Laravel App</b></h4>
        @if($data == '' or $data == null)
            <p style="font-size: 16px;">This is the email from VDT Laravel Api</p>
        @else
            <p style="font-size: 16px;">New country "{{ $data['country_name'] }}" - '{{ $data['country_code'] }}' has been created.</p>
        @endif
        <p>Thanks for reading</p>
    </div>
</div>
</body>
</html>
