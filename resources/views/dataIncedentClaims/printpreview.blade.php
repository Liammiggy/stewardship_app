<!DOCTYPE html>
<html>
<head>
    <title>Claims</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        @page {
            size: A4;
            
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header img {
            max-height: 70px;
        }

        .company-info h4 {
            margin: 0;
            font-weight: bold;
        }

        .info-block {
            margin-bottom: 10px;
            display: flex;
        }

        .info-label {
            width: 180px;
            font-weight: bold;
        }

        .info-value {
            flex: 1;
        }

        .amount-box {
            background-color: #f1f3f5;
            padding: 15px;
            border-radius: 6px;
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .amount-highlight {
            font-size: 1.6rem;
            font-weight: bold;
            color: #28a745;
        }

        .table-summary th, .table-summary td {
            padding: 8px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .signature-section {
            margin-top: 500px;
            display: flex;
            justify-content: space-around;
        }

        .signature-block {
            text-align: center;
            width: 30%;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin-top: 60px;
            padding-top: 5px;
            font-weight: bold;
        }

        .footer {
            margin-top: 80px;
            font-size: 12px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div>
                <img src="https://www.stewardshipassociation.org/wp-content/uploads/2025/02/HeaderLogo.png" alt="Logo">
            </div>
            <div class="company-info text-right">
                <h4>Stewardship Association</h4>
                <div>Bogo City, Cebu</div>
            </div>
        </div>

        <!-- Member Info -->
        <div>
            <div class="info-block">
                <div class="info-label">Nature of Benefits:</div>
                <div class="info-value">Death</div>
            </div>
            <div class="info-block">
                <div class="info-label">Name of Member:</div>
                <div class="info-value">Macario Porones Jr</div>
            </div>
            <div class="info-block">
                <div class="info-label">Address:</div>
                <div class="info-value">Puerto Princesa City, Palawan</div>
            </div>
            <div class="info-block">
                <div class="info-label">Church:</div>
                <div class="info-value">God's Kingdom Embassy</div>
            </div>
            <div class="info-block">
                <div class="info-label">Spouse:</div>
                <div class="info-value">N.A</div>
            </div>
            <div class="info-block">
                <div class="info-label">Pastor:</div>
                <div class="info-value">Armando Sabado</div>
            </div>
            <div class="info-block">
                <div class="info-label">Contact No.:</div>
                <div class="info-value">0999 222 22</div>
            </div>
            <div class="info-block">
                <div class="info-label">Beneficiary:</div>
                <div class="info-value">Cheryl Sabado</div>
            </div>
        </div>

        <!-- Amount Summary -->
        <div class="amount-box">
            <div><strong>Total Amount Active Members</strong></div>
            <div class="amount-highlight">₱49,225.00</div>
        </div>

        <!-- Breakdown Table -->
        <table class="table table-bordered table-summary mt-4">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Amount (₱)</th>
                    <th>% Share</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>For Member</td>
                    <td>33,247.13</td>
                    <td>67.50%</td>
                </tr>
                <tr>
                    <td>Tithe's Member</td>
                    <td>3,694.13</td>
                    <td>7.50%</td>
                </tr>
                <tr>
                    <td>Tithes Stewardship</td>
                    <td>1,231.38</td>
                    <td>2.50%</td>
                </tr>
                <tr>
                    <td>Mission Support</td>
                    <td>1,231.38</td>
                    <td>2.50%</td>
                </tr>
                <tr>
                    <td>Stewardship</td>
                    <td>9,851.00</td>
                    <td>20.00%</td>
                </tr>
            </tbody>
        </table>

        <!-- Signatures -->
        <div class="signature-section">
            <div class="signature-block">
                <div class="signature-line">Received by</div>
            </div>
            <div class="signature-block">
                <div class="signature-line">Prepared by</div>
            </div>
            <div class="signature-block">
                <div class="signature-line">Released by</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <!-- Stewardship Association – Official Document for Claim Releasing • Auto-generated print preview -->
        </div>
    </div>
</body>
</html>
