@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="about-container">
        <div class="about-header">
            <h1 class="about-title">About Us</h1>
            <p class="about-subtitle">Connecting talented developers with opportunities</p>
        </div>

        <div class="about-content">
            <div class="about-section">
                <h2 class="about-section-title">Our Mission</h2>
                <p class="about-section-text">
                    FindDeveloper is a platform dedicated to connecting skilled developers with clients and opportunities. 
                    We provide a space where developers can showcase their talents, skills, and projects, making it easier 
                    for businesses and individuals to find the perfect developer for their needs.
                </p>
            </div>

            <div class="about-section">
                <h2 class="about-section-title">What We Offer</h2>
                <div class="about-features">
                    <div class="about-feature-item">
                        <svg class="about-feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <h3 class="about-feature-title">Developer Profiles</h3>
                            <p class="about-feature-text">Comprehensive developer profiles showcasing skills, experience, and portfolios</p>
                        </div>
                    </div>

                    <div class="about-feature-item">
                        <svg class="about-feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <div>
                            <h3 class="about-feature-title">Advanced Search</h3>
                            <p class="about-feature-text">Powerful search and filtering tools to find developers by skills, location, and experience</p>
                        </div>
                    </div>

                    <div class="about-feature-item">
                        <svg class="about-feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <div>
                            <h3 class="about-feature-title">Verified Profiles</h3>
                            <p class="about-feature-text">All developer profiles are verified and approved by our team</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-section">
                <h2 class="about-section-title">Contact Us</h2>
                <p class="about-section-text">
                    Have questions or need assistance? We're here to help! Reach out to us through any of the following channels:
                </p>
                <div class="contact-methods">
                    <a href="https://wa.me/9647708246418" target="_blank" class="contact-method contact-method-whatsapp">
                        <div class="contact-method-icon">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <div class="contact-method-content">
                            <h3 class="contact-method-title">WhatsApp</h3>
                            <p class="contact-method-value">07708246418</p>
                        </div>
                        <svg class="contact-method-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <a href="https://t.me/ht3aa" target="_blank" class="contact-method contact-method-telegram">
                        <div class="contact-method-icon">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                        </div>
                        <div class="contact-method-content">
                            <h3 class="contact-method-title">Telegram</h3>
                            <p class="contact-method-value">@ht3aa</p>
                        </div>
                        <svg class="contact-method-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
