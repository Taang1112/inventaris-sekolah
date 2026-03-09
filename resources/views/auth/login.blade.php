<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="logo-container">
                <x-application-logo class="logo" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="status-messages" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="error-messages" :errors="$errors" />

        <div class="header-text">
            <h2>Selamat Datang Kembali</h2>
            <p>Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- LOGIN WITH GOOGLE -->
        <div class="social-login">
            <a href="{{ route('google-auth') }}" class="google-btn">
                <svg width="20" height="20" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                </svg>
                <span>Login dengan Google</span>
            </a>
        </div>

        <!-- divider -->
        <div class="divider">
            <span>atau login dengan email</span>
        </div>

        <!-- LOGIN FORM -->
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <x-input id="email" 
                        class="form-input" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        placeholder="nama@email.com"
                        required 
                        autofocus />
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <x-input id="password" 
                        class="form-input password-input" 
                        type="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        required autocomplete="current-password" />
                    <button type="button" onclick="togglePasswordVisibility('password')" class="toggle-password">
                        <svg id="password-eye" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember & Forgot -->
            <div class="flex-between">
                <label for="remember_me" class="remember-label">
                    <input id="remember_me" type="checkbox" name="remember" class="remember-checkbox">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- Button -->
            <div class="form-actions">
                <a href="{{ route('register') }}" class="register-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Buat akun baru
                </a>

                <x-button class="login-button">
                    Masuk
                </x-button>
            </div>

        </form>

        <!-- Additional Info -->
        <div class="info-text">
            <p>Dengan masuk, Anda menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> kami</p>
        </div>
    </x-auth-card>
</x-guest-layout>

<style>
    /* Modern CSS Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Logo Styling */
    .logo-container {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .logo {
        width: 80px;
        height: 80px;
        fill: #4f46e5;
        transition: all 0.3s ease;
    }

    .logo:hover {
        fill: #4338ca;
        transform: scale(1.05);
    }

    /* Header Text */
    .header-text {
        text-align: center;
        margin-bottom: 2rem;
    }

    .header-text h2 {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .header-text p {
        color: #4b5563;
        font-size: 0.875rem;
    }

    /* Status & Error Messages */
    .status-messages {
        background: #d1fae5;
        border: 1px solid #a7f3d0;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 1rem;
        color: #065f46;
        font-size: 0.875rem;
        animation: slideIn 0.3s ease;
    }

    .error-messages {
        background: #fee2e2;
        border: 1px solid #fecaca;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 1rem;
        color: #991b1b;
        font-size: 0.875rem;
        animation: slideIn 0.3s ease;
    }

    /* Google Button */
    .social-login {
        margin-bottom: 1.5rem;
    }

    .google-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        width: 100%;
        padding: 0.75rem 1rem;
        background: #ffffff;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .google-btn:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .google-btn:active {
        transform: translateY(0);
    }

    .google-btn svg {
        width: 20px;
        height: 20px;
    }

    /* Divider */
    .divider {
        position: relative;
        text-align: center;
        margin: 1.5rem 0;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e5e7eb;
        z-index: 1;
    }

    .divider span {
        position: relative;
        z-index: 2;
        background: white;
        padding: 0 1rem;
        color: #6b7280;
        font-size: 0.875rem;
    }

    /* Form Styling */
    .login-form {
        max-width: 400px;
        margin: 0 auto;
        animation: fadeIn 0.5s ease-out;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        color: #9ca3af;
        display: flex;
        align-items: center;
        pointer-events: none;
        transition: color 0.3s ease;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
        background: #ffffff;
    }

    .form-input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-input:focus + .toggle-password {
        color: #4f46e5;
    }

    .toggle-password {
        position: absolute;
        right: 1rem;
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        display: flex;
        align-items: center;
        padding: 0;
        transition: color 0.2s ease;
    }

    .toggle-password:hover {
        color: #4b5563;
    }

    /* Remember & Forgot Section */
    .flex-between {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 1rem 0 1.5rem;
    }

    .remember-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #374151;
        cursor: pointer;
    }

    .remember-checkbox {
        width: 1rem;
        height: 1rem;
        border: 2px solid #d1d5db;
        border-radius: 0.25rem;
        cursor: pointer;
        accent-color: #4f46e5;
        transition: all 0.2s ease;
    }

    .remember-checkbox:hover {
        border-color: #4f46e5;
    }

    .forgot-link {
        color: #4f46e5;
        font-size: 0.875rem;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .forgot-link:hover {
        color: #4338ca;
        text-decoration: underline;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.5rem;
    }

    .register-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #4f46e5;
        font-size: 0.875rem;
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem;
        border-radius: 0.375rem;
        transition: all 0.2s ease;
    }

    .register-link:hover {
        background: #f5f3ff;
        color: #4338ca;
    }

    .register-link svg {
        transition: transform 0.2s ease;
    }

    .register-link:hover svg {
        transform: translateX(-2px);
    }

    .login-button {
        background: #4f46e5;
        color: white;
        font-weight: 700;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        cursor: pointer;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
        transition: all 0.3s ease;
        min-width: 120px;
    }

    .login-button:hover {
        background: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
    }

    .login-button:active {
        transform: translateY(0);
    }

    .login-button.loading {
        opacity: 0.7;
        cursor: not-allowed;
        position: relative;
        color: transparent;
    }

    .login-button.loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -8px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spinner 0.6s linear infinite;
    }

    /* Info Text */
    .info-text {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
    }

    .info-text p {
        font-size: 0.75rem;
        color: #6b7280;
    }

    .info-text a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 500;
    }

    .info-text a:hover {
        text-decoration: underline;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes spinner {
        to {
            transform: rotate(360deg);
        }
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        .header-text h2 {
            font-size: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .register-link {
            order: 2;
            width: 100%;
            justify-content: center;
        }

        .login-button {
            width: 100%;
            order: 1;
        }

        .flex-between {
            flex-direction: column;
            gap: 0.75rem;
            align-items: flex-start;
        }

        .forgot-link {
            align-self: flex-end;
        }
    }

    /* Focus States for Accessibility */
    .form-input:focus-visible,
    .google-btn:focus-visible,
    .login-button:focus-visible,
    .register-link:focus-visible {
        outline: 2px solid #4f46e5;
        outline-offset: 2px;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: #c7c7c7;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a3a3a3;
    }
</style>

<script>
    // Toggle Password Visibility
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const eyeIcon = document.getElementById('password-eye');
        
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
        } else {
            input.type = 'password';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
        }
    }

    // DOM Content Loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll to errors/status
        const messages = document.querySelector('.error-messages, .status-messages');
        if (messages) {
            messages.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Auto dismiss after 5 seconds
            setTimeout(() => {
                messages.style.opacity = '0';
                messages.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    messages.style.display = 'none';
                }, 300);
            }, 5000);
        }

        // Form submission loading state
        const form = document.querySelector('.login-form');
        const loginBtn = document.querySelector('.login-button');
        
        if (form && loginBtn) {
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    return;
                }
                
                loginBtn.classList.add('loading');
                loginBtn.textContent = 'Memproses...';
            });
        }

        // Input focus effects
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                const icon = this.parentElement.querySelector('.input-icon');
                if (icon) {
                    icon.style.color = '#4f46e5';
                }
            });
            
            input.addEventListener('blur', function() {
                const icon = this.parentElement.querySelector('.input-icon');
                if (icon) {
                    icon.style.color = '#9ca3af';
                }
            });
        });

        // Remember me checkbox effect
        const rememberCheckbox = document.querySelector('.remember-checkbox');
        if (rememberCheckbox) {
            rememberCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    this.parentElement.style.color = '#4f46e5';
                } else {
                    this.parentElement.style.color = '#374151';
                }
            });
        }
    });

    // Prevent form resubmission on page refresh
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>