<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="logo-container">
                <x-application-logo class="logo" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="error-messages" :errors="$errors" />

        <div class="header-text">
            <h2>Buat Akun Baru</h2>
            <p>Daftar untuk memulai perjalanan Anda bersama kami</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <x-input id="name" 
                        class="form-input" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        placeholder="Masukkan nama lengkap"
                        required 
                        autofocus />
                </div>
            </div>

            <!-- Email Address -->
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
                        required />
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
                        placeholder="Minimal 8 karakter"
                        required autocomplete="new-password" />
                    <button type="button" onclick="togglePasswordVisibility('password')" class="toggle-password">
                        <svg id="password-eye" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <div class="password-hint">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </span>
                    <x-input id="password_confirmation" 
                        class="form-input password-input" 
                        type="password"
                        name="password_confirmation" 
                        placeholder="Ketik ulang kata sandi"
                        required />
                    <button type="button" onclick="togglePasswordVisibility('password_confirmation')" class="toggle-password">
                        <svg id="confirm-password-eye" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="terms-group">
                <input id="terms" name="terms" type="checkbox" class="terms-checkbox">
                <label for="terms">
                    Saya menyetujui 
                    <a href="#">Syarat & Ketentuan</a> 
                    dan 
                    <a href="#">Kebijakan Privasi</a>
                </label>
            </div>

            <div class="form-actions">
                <a href="{{ route('login') }}" class="login-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Sudah punya akun?
                </a>

                <x-button class="register-button">
                    Daftar Sekarang
                </x-button>
            </div>
        </form>

        <!-- Social Login -->
        <div class="social-section">
            <div class="divider">
                <span>Atau daftar dengan</span>
            </div>

            <div class="social-buttons">
                <button class="social-btn github">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V19c0 .27.16.59.67.5C17.14 18.16 20 14.42 20 10A10 10 0 0010 0z" />
                    </svg>
                    <span>GitHub</span>
                </button>
                <button class="social-btn facebook">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.879v-6.99h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.99C16.343 19.128 20 14.991 20 10z" />
                    </svg>
                    <span>Facebook</span>
                </button>
            </div>
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

    /* Form Styling */
    .register-form {
        max-width: 400px;
        margin: 0 auto;
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
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-input.error {
        border-color: #ef4444;
    }

    .form-input.success {
        border-color: #10b981;
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

    .password-hint {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }

    /* Terms Group */
    .terms-group {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
    }

    .terms-checkbox {
        width: 1rem;
        height: 1rem;
        border: 2px solid #d1d5db;
        border-radius: 0.25rem;
        cursor: pointer;
        accent-color: #4f46e5;
    }

    .terms-group label {
        margin-left: 0.5rem;
        font-size: 0.875rem;
        color: #374151;
    }

    .terms-group a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 500;
    }

    .terms-group a:hover {
        text-decoration: underline;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 2rem;
    }

    .login-link {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        color: #4f46e5;
        font-size: 0.875rem;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .login-link:hover {
        color: #4338ca;
    }

    .register-button {
        background: #4f46e5;
        color: white;
        font-weight: 700;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        cursor: pointer;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .register-button:hover {
        background: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .register-button:active {
        transform: translateY(0);
    }

    /* Social Section */
    .social-section {
        margin-top: 2rem;
    }

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

    .social-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
    }

    .social-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4b5563;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        background: #f9fafb;
        border-color: #9ca3af;
    }

    .github svg {
        color: #1f2937;
    }

    .facebook svg {
        color: #3b5998;
    }

    /* Error Messages */
    .error-messages {
        background: #fee2e2;
        border: 1px solid #fecaca;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 1rem;
        color: #991b1b;
        font-size: 0.875rem;
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

        .register-button {
            width: 100%;
        }

        .social-buttons {
            grid-template-columns: 1fr;
        }
    }

    /* Animation */
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

    .register-form {
        animation: fadeIn 0.5s ease-out;
    }

    /* Loading State */
    .register-button.loading {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Success State */
    .password-match {
        border-color: #10b981 !important;
    }

    .password-mismatch {
        border-color: #ef4444 !important;
    }
</style>

<script>
    // Toggle Password Visibility
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const eyeIcon = inputId === 'password' ? 
            document.getElementById('password-eye') : 
            document.getElementById('confirm-password-eye');
        
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
        } else {
            input.type = 'password';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
        }
    }

    // Password Match Validation
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        
        if (password && confirmPassword) {
            function validatePassword() {
                if (password.value && confirmPassword.value) {
                    if (password.value === confirmPassword.value) {
                        confirmPassword.classList.remove('password-mismatch');
                        confirmPassword.classList.add('password-match');
                    } else {
                        confirmPassword.classList.remove('password-match');
                        confirmPassword.classList.add('password-mismatch');
                    }
                } else {
                    confirmPassword.classList.remove('password-match', 'password-mismatch');
                }
            }
            
            password.addEventListener('keyup', validatePassword);
            confirmPassword.addEventListener('keyup', validatePassword);
        }

        // Smooth scroll to errors
        const errors = document.querySelector('.error-messages');
        if (errors) {
            errors.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // Form submission loading state
        const form = document.querySelector('.register-form');
        const registerBtn = document.querySelector('.register-button');
        
        if (form && registerBtn) {
            form.addEventListener('submit', function() {
                registerBtn.classList.add('loading');
                registerBtn.textContent = 'Mendaftarkan...';
            });
        }
    });

    // Input focus effects
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.querySelector('.input-icon').style.color = '#4f46e5';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.querySelector('.input-icon').style.color = '#9ca3af';
        });
    });
</script>