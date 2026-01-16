<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        /* CSS Reset for Email */
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            background-color: #f6f6f6;
        }

        table, td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }

            .body {
                padding: 10px !important;
            }

            .content-cell {
                padding: 10px !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
                display: block !important;
            }
        }
    </style>
    {!! $head ?? '' !!}
</head>
<body style="background-color: #f6f6f6; margin: 0; padding: 0;">

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #f6f6f6;">
    <tr>
        <td align="center" style="padding: 20px 0;">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                {!! $header ?? '' !!}

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell" style="padding: 20px;">
                                    {!! Illuminate\Mail\Markdown::parse($slot) !!}

                                    {!! $subcopy ?? '' !!}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {!! $footer ?? '' !!}
            </table>
        </td>
    </tr>
</table>
</body>
</html>
