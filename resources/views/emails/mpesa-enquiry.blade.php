<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Received – Safe World Telecom</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Helvetica Neue', Arial, sans-serif; }
        body { background-color: #f4f4f4; padding: 40px 20px; }
        .wrapper { max-width: 600px; margin: 0 auto; }
        .card { background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #1e3040 0%, #2d4a60 100%); padding: 40px 40px 30px; text-align: center; }
        .header img { height: 48px; margin-bottom: 16px; }
        .header h1 { color: #ffffff; font-size: 22px; font-weight: 700; margin-bottom: 6px; }
        .header p { color: rgba(255,255,255,0.7); font-size: 14px; }
        .green-strip { background-color: #16a34a; padding: 12px 40px; text-align: center; }
        .green-strip p { color: #ffffff; font-size: 13px; font-weight: 600; letter-spacing: 0.05em; }
        .body { padding: 36px 40px; }
        .greeting { font-size: 18px; font-weight: 700; color: #1e3040; margin-bottom: 12px; }
        .text { font-size: 14px; color: #555; line-height: 1.7; margin-bottom: 24px; }
        .details-box { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 28px; }
        .details-box h3 { font-size: 12px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 16px; }
        .detail-row { display: flex; margin-bottom: 12px; }
        .detail-label { font-size: 13px; font-weight: 600; color: #1e3040; width: 120px; flex-shrink: 0; }
        .detail-value { font-size: 13px; color: #475569; flex: 1; }
        .enquiry-box { background: #f0fdf4; border-left: 4px solid #16a34a; padding: 16px 20px; border-radius: 0 8px 8px 0; margin-top: 16px; }
        .enquiry-box p { font-size: 14px; color: #374151; line-height: 1.7; }
        .cta-section { text-align: center; margin: 28px 0; }
        .cta-btn { display: inline-block; background: linear-gradient(135deg, #b5342a, #1e3040); color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 50px; font-size: 14px; font-weight: 700; }
        .divider { border: none; border-top: 1px solid #e2e8f0; margin: 28px 0; }
        .footer-note { font-size: 12px; color: #94a3b8; line-height: 1.6; }
        .footer { background: #1e3040; padding: 24px 40px; text-align: center; }
        .footer p { color: rgba(255,255,255,0.5); font-size: 12px; line-height: 1.7; }
        .footer a { color: #b5342a; text-decoration: none; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="card">

        {{-- Header --}}
        <div class="header">
            <h1>M-Pesa Enquiry Received</h1>
            <p>Safe World Telecom — Your Technology Partner</p>
        </div>

        {{-- Green confirmation strip --}}
        <div class="green-strip">
            <p>✓ &nbsp; Your enquiry has been successfully submitted</p>
        </div>

        {{-- Body --}}
        <div class="body">
            <p class="greeting">Hello, {{ $enquiry->name }}!</p>
            <p class="text">
                Thank you for reaching out to Safe World Telecom. We have received your M-Pesa enquiry and a member of our team will review it and get back to you as soon as possible — usually within 1–2 business days.
            </p>

            {{-- Enquiry Summary --}}
            <div class="details-box">
                <h3>Your Enquiry Summary</h3>
                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $enquiry->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Position</span>
                    <span class="detail-value">{{ $enquiry->position }}</span>
                </div>
                @if($enquiry->workplace)
                <div class="detail-row">
                    <span class="detail-label">Workplace</span>
                    <span class="detail-value">{{ $enquiry->workplace }}</span>
                </div>
                @endif
                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $enquiry->email }}</span>
                </div>
                <div style="margin-top: 8px;">
                    <span class="detail-label" style="display:block; margin-bottom: 8px;">Your Enquiry</span>
                    <div class="enquiry-box">
                        <p>{{ $enquiry->enquiry }}</p>
                    </div>
                </div>
            </div>

            <p class="text">
                In the meantime, feel free to browse our shop or visit any of our <strong>19 outlets</strong> nationwide for immediate assistance.
            </p>

            <div class="cta-section">
                <a href="{{ config('app.url') }}/shop" class="cta-btn">Browse Our Shop</a>
            </div>

            <hr class="divider">

            <p class="footer-note">
                If you did not submit this enquiry or believe this was sent in error, please ignore this email. For urgent matters, you can reach us on WhatsApp at <strong>+254 712 345 678</strong>.
            </p>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <p>
                © {{ date('Y') }} Safe World Telecom. All Rights Reserved.<br>
                <a href="{{ config('app.url') }}">safeworldtelecom.co.ke</a>
            </p>
        </div>

    </div>
</div>
</body>
</html>
