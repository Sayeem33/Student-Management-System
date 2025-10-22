<svg viewBox="0 0 240 240" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <!-- Background Circle with Gradient -->
    <defs>
        <linearGradient id="bgGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#EEF2FF;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#E0F2FE;stop-opacity:1" />
        </linearGradient>
        <linearGradient id="capGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#6366F1;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#4F46E5;stop-opacity:1" />
        </linearGradient>
        <linearGradient id="bookGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#1D4ED8;stop-opacity:1" />
        </linearGradient>
        <filter id="shadow">
            <feDropShadow dx="0" dy="2" stdDeviation="3" flood-opacity="0.15"/>
        </filter>
    </defs>
    
    <!-- Background Circle -->
    <circle cx="120" cy="120" r="115" fill="url(#bgGradient)"/>
    <circle cx="120" cy="120" r="105" fill="white" opacity="0.8"/>
    
    <!-- Open Book Base -->
    <g transform="translate(120, 140)" filter="url(#shadow)">
        <!-- Left Page -->
        <path d="M -55,-30 L -55,30 Q -55,38 -45,38 L -5,38 L -5,-30 Z" 
              fill="#FFFFFF" stroke="#CBD5E1" stroke-width="2"/>
        <!-- Page Lines -->
        <line x1="-45" y1="-20" x2="-15" y2="-20" stroke="#E2E8F0" stroke-width="2"/>
        <line x1="-45" y1="-8" x2="-15" y2="-8" stroke="#E2E8F0" stroke-width="2"/>
        <line x1="-45" y1="4" x2="-15" y2="4" stroke="#E2E8F0" stroke-width="2"/>
        <line x1="-45" y1="16" x2="-15" y2="16" stroke="#E2E8F0" stroke-width="2"/>
        
        <!-- Right Page -->
        <path d="M 55,-30 L 55,30 Q 55,38 45,38 L 5,38 L 5,-30 Z" 
              fill="#FFFFFF" stroke="#CBD5E1" stroke-width="2"/>
        <!-- Page Lines -->
        <line x1="15" y1="-20" x2="45" y2="-20" stroke="#E2E8F0" stroke-width="2"/>
        <line x1="15" y1="-8" x2="45" y2="-8" stroke="#E2E8F0" stroke-width="2"/>
        <line x1="15" y1="4" x2="45" y2="4" stroke="#E2E8F0" stroke-width="2"/>
        <line x1="15" y1="16" x2="45" y2="16" stroke="#E2E8F0" stroke-width="2"/>
        
        <!-- Book Spine -->
        <rect x="-5" y="-30" width="10" height="68" fill="url(#bookGradient)" rx="2"/>
        <!-- Spine Highlight -->
        <rect x="-5" y="-30" width="3" height="68" fill="#60A5FA" opacity="0.5" rx="1"/>
    </g>
    
    <!-- Graduation Cap (Floating) -->
    <g transform="translate(120, 75)" filter="url(#shadow)">
        <!-- Shadow underneath -->
        <ellipse cx="0" cy="18" rx="50" ry="6" fill="#000000" opacity="0.08"/>
        
        <!-- Cap Board Base -->
        <path d="M 0,-12 L -50,0 L -50,4 L 0,16 L 50,4 L 50,0 Z" 
              fill="#5B21B6"/>
        
        <!-- Cap Board Top (3D effect) -->
        <path d="M 0,-12 L -50,0 L 0,12 L 50,0 Z" 
              fill="url(#capGradient)"/>
        
        <!-- Highlight on cap -->
        <path d="M 0,-10 L -30,-2 L 0,6 L 30,-2 Z" 
              fill="#FFFFFF" opacity="0.2"/>
        
        <!-- Button on top -->
        <circle cx="0" cy="-12" r="5" fill="#FBBF24"/>
        <circle cx="0" cy="-12" r="3" fill="#FCD34D"/>
        
        <!-- Tassel -->
        <g transform="translate(40, -8)">
            <line x1="0" y1="0" x2="10" y2="15" stroke="#FBBF24" stroke-width="2.5" stroke-linecap="round"/>
            <circle cx="10" cy="18" r="6" fill="#FBBF24"/>
            <circle cx="10" cy="18" r="4" fill="#F59E0B"/>
        </g>
    </g>
    
    <!-- Decorative Elements -->
    <!-- Stars -->
    <g opacity="0.7">
        <path d="M 35,55 L 37,62 L 44,64 L 37,66 L 35,73 L 33,66 L 26,64 L 33,62 Z" 
              fill="#FBBF24"/>
        <path d="M 205,85 L 207,92 L 214,94 L 207,96 L 205,103 L 203,96 L 196,94 L 203,92 Z" 
              fill="#06B6D4"/>
        <path d="M 45,185 L 47,192 L 54,194 L 47,196 L 45,203 L 43,196 L 36,194 L 43,192 Z" 
              fill="#8B5CF6"/>
    </g>
    
    <!-- Orbiting Elements -->
    <circle cx="185" cy="120" r="5" fill="#6366F1" opacity="0.4"/>
    <circle cx="55" cy="120" r="5" fill="#10B981" opacity="0.4"/>
    <circle cx="120" cy="205" r="4" fill="#F59E0B" opacity="0.4"/>
    <circle cx="175" cy="165" r="3" fill="#3B82F6" opacity="0.3"/>
    <circle cx="65" cy="75" r="3" fill="#8B5CF6" opacity="0.3"/>
    
    <!-- Badge with Text -->
    <g transform="translate(120, 218)">
        <rect x="-38" y="-13" width="76" height="26" rx="13" 
              fill="url(#capGradient)" filter="url(#shadow)"/>
        <rect x="-36" y="-11" width="72" height="22" rx="11" 
              fill="#4F46E5"/>
        <text x="0" y="5" font-family="'Segoe UI', Arial, sans-serif" 
              font-size="16" font-weight="bold" text-anchor="middle" 
              fill="#FFFFFF" letter-spacing="1">SMS</text>
    </g>
</svg>
