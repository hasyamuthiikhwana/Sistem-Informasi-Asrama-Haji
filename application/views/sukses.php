<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Merdeka! - Biodata Heldi</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style type="text/css">
        /* Reset & Base */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            background: #f4f4f4;
            background-image: 
                linear-gradient(135deg, #ff0000 0%, #ffffff 50%, #ff0000 100%);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        #container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 90%;
            position: relative;
        }

        /* Tulisan Dahsyat & Blink */
        .berhasil-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            text-transform: uppercase;
            margin-bottom: 20px;
            letter-spacing: -2px;
            line-height: 1;
            animation: blinkRedWhite 0.8s infinite;
            text-shadow: 0 0 20px rgba(0,0,0,0.2);
        }

        @keyframes blinkRedWhite {
            0%, 100% { color: #ff0000; text-shadow: 0 0 30px #ff0000; }
            50% { color: #ffffff; text-shadow: 0 0 30px #ffffff; }
        }

        h1 {
            color: #333;
            font-size: 1.2rem;
            background: #fff;
            display: inline-block;
            padding: 5px 20px;
            border-radius: 50px;
            margin-bottom: 30px;
            font-weight: 700;
        }

        #body p {
            font-size: 1.5rem;
            color: #222;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .flag-accent {
            height: 10px;
            width: 100px;
            background: linear-gradient(to bottom, #ff0000 50%, #ffffff 50%);
            margin: 20px auto;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        /* Footer Info */
        p.footer {
            margin-top: 30px;
            font-size: 11px;
            color: #444;
            background: rgba(255,255,255,0.5);
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
        }

        /* Tambahan Ornamen */
        .merdeka-badge {
            position: absolute;
            top: -20px;
            right: -20px;
            background: #ff0000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
            transform: rotate(15deg);
            box-shadow: 5px 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div id="container">
    <div class="merdeka-badge">MERDEKA! 🇮🇩</div>
    
    <div class="berhasil-text">YES SAYA BERHASIL</div>
    
    <h1>BIODATA DIRI</h1>
    <div class="flag-accent"></div>

    <div id="body">
        <p>Halo, Saya <span style="border-bottom: 3px solid #ff0000;">Heldi</span></p>
        <p style="font-size: 1rem; font-weight: normal; opacity: 0.8;">Junior Web Developer</p>
    </div>

    <p class="footer">
        🚀 Rendered in <strong>{elapsed_time}</strong> seconds. 
        <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter v' . CI_VERSION : '' ?>
    </p>
</div>

</body>
</html>