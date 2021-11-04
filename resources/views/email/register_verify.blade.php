<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Registration Verify</title>
</head>
<body>

<table class="body-wrap">
    <tr>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        <h3>Welcome in {{ env('APP_NAME') }}</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Hello {{$name}} We are Warm Welcoming You in {{ env('APP_NAME') }}. Please Confirm Your Email By Clicking Below Button
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block aligncenter">
                                        <a href="{{$verify_link}}" class="btn-primary">Confirm email address</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

</body>
</html>
