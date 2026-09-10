
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login | Academy Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            min-height:100vh;
            background:#080e17;
            color:#edf3fb;
            font-family:Arial, Helvetica, sans-serif;
            overflow:hidden;
        }

        /* ================================
           ANIMATED BACKGROUND
        ================================= */

        .login-page{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
            overflow:hidden;
            padding:20px;
        }

        .login-page::before{
            content:"";
            position:absolute;
            width:500px;
            height:500px;
            border-radius:50%;
            background:rgba(139,92,246,.10);
            filter:blur(90px);
            top:-220px;
            left:-180px;
            animation:floatOne 8s ease-in-out infinite;
        }

        .login-page::after{
            content:"";
            position:absolute;
            width:450px;
            height:450px;
            border-radius:50%;
            background:rgba(34,211,238,.08);
            filter:blur(90px);
            bottom:-220px;
            right:-150px;
            animation:floatTwo 9s ease-in-out infinite;
        }

        @keyframes floatOne{

            0%,100%{
                transform:translate(0,0);
            }

            50%{
                transform:translate(45px,35px);
            }

        }

        @keyframes floatTwo{

            0%,100%{
                transform:translate(0,0);
            }

            50%{
                transform:translate(-40px,-30px);
            }

        }

        /* ================================
           GRID BACKGROUND
        ================================= */

        .grid-bg{
            position:absolute;
            inset:0;
            opacity:.16;
            background-image:
                linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px);
            background-size:42px 42px;
            mask-image:linear-gradient(to bottom, transparent, black 25%, black 75%, transparent);
        }

        /* ================================
           LOGIN CARD
        ================================= */

        .login-card{
            width:100%;
            max-width:420px;
            position:relative;
            z-index:5;

            background:linear-gradient(
                145deg,
                rgba(17,27,42,.96),
                rgba(10,18,30,.97)
            );

            border:1px solid #26364d;
            border-radius:20px;

            padding:34px;

            box-shadow:
                0 30px 80px rgba(0,0,0,.45),
                0 0 50px rgba(139,92,246,.06);

            animation:cardEnter .8s cubic-bezier(.2,.8,.2,1);
        }

        .login-card::before{
            content:"";
            position:absolute;
            inset:0;
            border-radius:20px;
            pointer-events:none;

            background:
                linear-gradient(
                    120deg,
                    rgba(139,92,246,.08),
                    transparent 35%,
                    transparent 65%,
                    rgba(34,211,238,.05)
                );
        }

        @keyframes cardEnter{

            from{
                opacity:0;
                transform:translateY(25px) scale(.97);
            }

            to{
                opacity:1;
                transform:translateY(0) scale(1);
            }

        }

        /* ================================
           BRAND
        ================================= */

        .brand-icon{
            width:62px;
            height:62px;
            margin:0 auto 17px;

            display:grid;
            place-items:center;

            border-radius:17px;

            background:
                linear-gradient(
                    135deg,
                    #312e81,
                    #7c3aed
                );

            border:1px solid rgba(167,139,250,.45);

            color:#fff;
            font-size:27px;

            box-shadow:
                0 0 22px rgba(139,92,246,.25),
                inset 0 0 20px rgba(255,255,255,.06);

            animation:
                iconFloat 3s ease-in-out infinite,
                iconGlow 2.5s ease-in-out infinite alternate;
        }

        @keyframes iconFloat{

            0%,100%{
                transform:translateY(0);
            }

            50%{
                transform:translateY(-4px);
            }

        }

        @keyframes iconGlow{

            from{
                box-shadow:
                    0 0 18px rgba(139,92,246,.20),
                    inset 0 0 15px rgba(255,255,255,.04);
            }

            to{
                box-shadow:
                    0 0 30px rgba(139,92,246,.38),
                    inset 0 0 20px rgba(255,255,255,.07);
            }

        }

        .login-kicker{
            text-align:center;
            font-size:9px;
            letter-spacing:2px;
            text-transform:uppercase;
            color:#22d3ee;
            font-weight:900;
            margin-bottom:7px;
        }

        .login-title{
            text-align:center;
            color:#f8fafc;
            font-size:25px;
            font-weight:900;
            margin:0;
        }

        .login-subtitle{
            text-align:center;
            color:#718096;
            font-size:11px;
            margin-top:7px;
            margin-bottom:28px;
        }

        /* ================================
           ERROR
        ================================= */

        .login-error{
            display:flex;
            align-items:center;
            gap:9px;

            background:rgba(244,63,94,.08);
            border:1px solid rgba(244,63,94,.25);
            color:#fda4af;

            border-radius:10px;
            padding:10px 12px;

            font-size:10px;
            margin-bottom:18px;

            animation:errorShake .35s ease;
        }

        @keyframes errorShake{

            0%,100%{
                transform:translateX(0);
            }

            25%{
                transform:translateX(-5px);
            }

            75%{
                transform:translateX(5px);
            }

        }

        /* ================================
           FORM
        ================================= */

        .form-group{
            margin-bottom:18px;
        }

        .form-label{
            color:#aab7ca;
            font-size:10px;
            font-weight:800;
            margin-bottom:7px;
        }

        .input-wrap{
            position:relative;
        }

        .input-icon{
            position:absolute;
            left:13px;
            top:50%;
            transform:translateY(-50%);

            color:#65758c;
            font-size:14px;

            transition:.25s ease;
            pointer-events:none;
        }

        .login-input{
            width:100%;
            height:45px;

            background:#0c1624;
            border:1px solid #26364b;
            border-radius:10px;

            color:#e5edf7;
            font-size:11px;

            padding:0 13px 0 39px;

            outline:none;

            transition:
                border-color .25s ease,
                box-shadow .25s ease,
                background .25s ease;
        }

        .login-input::placeholder{
            color:#53637a;
        }

        .login-input:focus{
            background:#0d1827;
            border-color:#22d3ee;

            box-shadow:
                0 0 0 3px rgba(34,211,238,.07),
                0 0 18px rgba(34,211,238,.08);
        }

        .input-wrap:focus-within .input-icon{
            color:#22d3ee;
            filter:drop-shadow(0 0 5px rgba(34,211,238,.65));
        }

        /* ================================
           LOGIN BUTTON
        ================================= */

        .login-btn{
            width:100%;
            height:46px;

            border:1px solid #7858f2;
            border-radius:10px;

            background:
                linear-gradient(
                    135deg,
                    #6848e8,
                    #8b5cf6
                );

            color:#fff;
            font-size:11px;
            font-weight:900;

            position:relative;
            overflow:hidden;

            transition:
                transform .2s ease,
                box-shadow .25s ease;
        }

        .login-btn::before{
            content:"";
            position:absolute;
            top:0;
            left:-120%;
            width:80%;
            height:100%;

            background:linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,.22),
                transparent
            );

            transform:skewX(-20deg);
            transition:.6s ease;
        }

        .login-btn:hover{
            transform:translateY(-2px);

            box-shadow:
                0 10px 28px rgba(124,58,237,.28),
                0 0 18px rgba(139,92,246,.16);

            color:#fff;
        }

        .login-btn:hover::before{
            left:130%;
        }

        .login-btn:active{
            transform:translateY(0);
        }

        .login-btn i{
            margin-right:6px;
            filter:drop-shadow(0 0 4px rgba(255,255,255,.45));
        }

        /* ================================
           FOOTER
        ================================= */

        .login-footer{
            text-align:center;
            color:#4f6076;
            font-size:9px;
            margin-top:23px;
        }

        .login-footer span{
            color:#66778e;
        }

        /* ================================
           STATUS DOT
        ================================= */

        .system-status{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:6px;

            margin-top:13px;

            color:#607089;
            font-size:8px;
        }

        .status-dot{
            width:6px;
            height:6px;
            border-radius:50%;

            background:#22c55e;

            box-shadow:
                0 0 7px rgba(34,197,94,.7);

            animation:statusPulse 1.8s ease-in-out infinite;
        }

        @keyframes statusPulse{

            0%,100%{
                opacity:.5;
                transform:scale(.85);
            }

            50%{
                opacity:1;
                transform:scale(1);
            }

        }

        /* ================================
           MOBILE
        ================================= */

        @media(max-width:500px){

            .login-page{
                padding:15px;
            }

            .login-card{
                padding:27px 22px;
                border-radius:17px;
            }

            .login-title{
                font-size:22px;
            }

        }

    </style>

</head>


<body>

<div class="login-page">

    <div class="grid-bg"></div>


    <div class="login-card">

        {{-- Brand --}}

        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>


        <div class="login-kicker">
            Smart Academy System
        </div>


        <h1 class="login-title">
            Academy Management
        </h1>


        <p class="login-subtitle">
            Secure access to your academy portal
        </p>


        {{-- Errors --}}

        @if ($errors->any())

            <div class="login-error">

                <i class="bi bi-exclamation-circle-fill"></i>

                <span>
                    {{ $errors->first() }}
                </span>

            </div>

        @endif


        {{-- Login Form --}}

        <form
            action="{{ route('login.submit') }}"
            method="POST"
        >

            @csrf


            {{-- Email --}}

            <div class="form-group">

                <label
                    for="email"
                    class="form-label"
                >
                    EMAIL ADDRESS
                </label>


                <div class="input-wrap">

                    <i class="bi bi-envelope-fill input-icon"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="login-input"
                        value="{{ old('email') }}"
                        placeholder="Enter your email address"
                        required
                        autofocus
                    >

                </div>

            </div>


            {{-- Password --}}

            <div class="form-group">

                <label
                    for="password"
                    class="form-label"
                >
                    PASSWORD
                </label>


                <div class="input-wrap">

                    <i class="bi bi-lock-fill input-icon"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="login-input"
                        placeholder="Enter your password"
                        required
                    >

                </div>

            </div>


            {{-- Login Button --}}

            <button
                type="submit"
                class="login-btn"
            >

                <i class="bi bi-box-arrow-in-right"></i>

                Login to Academy Portal

            </button>

        </form>


        {{-- System Status --}}

        <div class="system-status">

            <span class="status-dot"></span>

            Academy system online

        </div>


        {{-- Footer --}}

        <div class="login-footer">

            <span>Academy Management System</span>
            <br>
            Secure administration portal

        </div>

    </div>

</div>

</body>

</html>
