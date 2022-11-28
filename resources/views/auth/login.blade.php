<link href="{{url("/css/auth/login.css")}}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{url("/js/auth/login.js")}}"></script>
<div class="col-12 text-center">
    {{-- <h1>Bienvenido, {{Auth::user()->name}}</h1> --}}

</div>
            <!-- Form-->
                <div class="form">
                    <div class="form-toggle"></div>

                    <div class="form-panel one">
                        <div class="form-header">
                            <h1>INICIO DE SESIÓN DE CUENTA</h1>
                        </div>
                        <div class="form-content">
                            <form id="frmLogin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                </div>
                                <div class="form-group">
                                    <label class="form-remember" id="remember_me" name="remember">
                                    <input type="checkbox"/>{{ __('Remember Me') }}

                                    {{-- </label><a class="form-recovery" href="#">Forgot Password?</a> --}}
                                </div>
                                <div class="form-group">
                                    <button type="submit">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="form-panel two">
                        <div class="form-header">
                            <h1>Registro</h1>
                        </div>
                        <div class="form-content">
                            <form id="frmRegister" method="POST" action="">
                                {{-- <form id="frmRegister" method="POST" action="{{ route('usuarios.register') }}"> --}}
                                @csrf
                                <div class="form-group">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="emailRegister" value="{{ __('Email') }}" />
                                    <x-jet-input id="emailRegister" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="passwordRegister" value="{{ __('Password') }}" />
                                    <x-jet-input id="passwordRegister" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btnRegister">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
