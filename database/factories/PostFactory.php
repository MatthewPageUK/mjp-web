<?php

namespace Database\Factories;

use Database\Factories\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    use HasActive;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $articleTitles = [
            "Introduction to Responsive Web Design",
            "Creating Dynamic Web Applications with JavaScript",
            "The Evolution of CSS: From Floats to Flexbox",
            "Mastering HTML5 Semantic Elements",
            "Optimizing Website Performance for Better User Experience",
            "Building Scalable Web APIs with RESTful Architecture",
            "Exploring the Power of Node.js in Backend Development",
            "Getting Started with Vue.js: A Progressive JavaScript Framework",
            "Demystifying Frontend Frameworks: React vs Angular vs Vue",
            "The Art of Debugging: Techniques for Efficient Troubleshooting",
            "Securing Your Web Applications: Best Practices and Techniques",
            "Understanding Cross-Site Scripting (XSS) Vulnerabilities",
            "Practical Guide to Building Progressive Web Apps (PWAs)",
            "An In-Depth Look at Web Accessibility Standards",
            "GraphQL: The Next Step in API Development",
            "The Role of DevOps in Modern Web Development",
            "Responsive Images: Techniques and Tools",
            "Exploring the World of WebSockets: Real-time Communication",
            "CSS Grid Layout: Creating Complex Web Layouts",
            "Optimizing SEO for Dynamic Single-Page Applications (SPAs)",
            "Introduction to Docker: Containerization for Web Developers",
            "WebAssembly: The Future of High-Performance Web Applications",
            "Building Effective User Authentication Systems",
            "Exploring Modern CSS: Flexbox and Grid",
            "A Comprehensive Guide to Browser Developer Tools",
            "Using Git and GitHub Effectively in Web Development",
            "Web Security: Best Practices for Protecting Your Website",
            "Responsive Typography: Techniques and Approaches",
            "Mastering CSS Preprocessors: SASS and LESS",
            "RESTful vs GraphQL APIs: Choosing the Right Approach",
            "Introduction to Web Design Principles and UI/UX",
            "Creating Data-Driven Visualizations with D3.js",
            "Implementing Two-Factor Authentication in Web Applications",
            "The Rise of JAMstack: Modern Web Architecture",
            "Web Scraping: Techniques and Ethical Considerations",
            "Modernizing Legacy Web Applications: Tips and Strategies",
            "Building Cross-Platform Mobile Apps with React Native",
            "Exploring New Horizons: WebVR and WebAR Development",
            "Optimizing Website Accessibility for Diverse Users",
            "Web Performance Optimization: Strategies and Tools",
            "Progressive Enhancement vs Graceful Degradation",
            "Working with Third-Party APIs: Tips and Pitfalls",
            "Introduction to Serverless Computing for Web Developers",
            "The Impact of Artificial Intelligence on Web Development",
            "Effective Error Handling and Validation in Web Forms",
            "Creating Custom WordPress Themes from Scratch",
            "Getting Started with Angular: A TypeScript-based Framework",
            "Web Design Trends: Past, Present, and Future",
            "Implementing Content Security Policies (CSP) for Web Apps",
            "Web Analytics: Tools and Techniques for Data-driven Decisions",
            "Building Real-Time Collaborative Tools with WebSockets",
            "The Role of UI/UX in Mobile App Development",
            "Exploring CSS-in-JS: Styling React Applications",
            "Web Development Best Practices: Code Organization and Structure",
            "Understanding the Basics of Cryptocurrency and Blockchain",
            "Designing Effective Landing Pages for Higher Conversions",
            "Creating Interactive Web Maps with JavaScript Libraries",
            "Web Application Caching: Strategies for Faster Load Times",
            "Mastering WebSockets: Advanced Techniques and Use Cases",
            "Building Chat Applications with Socket.IO",
            "The Intersection of AI and Web Development",
            "Adapting Your Website for Dark Mode",
            "Server-Side Rendering (SSR) vs Client-Side Rendering (CSR)",
            "Designing for Mobile-First Experiences",
            "Exploring Cloud Computing and its Impact on Web Development",
            "Web Accessibility Testing: Tools and Techniques",
            "Creating Engaging Animations with CSS and JavaScript",
            "The Power of Single Page Applications (SPAs)",
            "Implementing Payment Gateways in E-Commerce Websites",
            "Web Development Ethics: Privacy and Data Security",
            "Optimizing JavaScript Performance for Speedy Applications",
            "Building Scalable Microservices for Modern Web Apps",
            "Creating Custom Data Visualizations with Charting Libraries",
            "Web Design Psychology: Understanding User Behavior",
            "Evolving Trends in Frontend Development",
            "Optimizing Images for the Web: Formats and Compression",
            "Introduction to WebAssembly: High-Performance Web Apps",
            "Implementing Internationalization (i18n) in Web Applications",
            "Web Accessibility: Designing for All Abilities",
            "The Role of Containers in Streamlining Development",
            "Developing Voice-Enabled Web Applications",
            "Cryptocurrency Payment Integration for E-Commerce",
            "Web Development for IoT (Internet of Things) Applications",
            "Exploring Quantum Computing and its Potential Impact",
            "Building Personal Branding Websites for Developers",
            "Securing APIs: OAuth, JWT, and Token-Based Authentication",
            "Understanding the Basics of UX Writing",
            "The Rise of Low-Code and No-Code Development Platforms",
            "Creating Effective Calls to Action (CTAs) on Your Website",
            "Continuous Integration and Deployment (CI/CD) in Web Development",
            "The Future of Web Browsers: Trends and Innovations",
            "Exploring Edge Computing for Faster Web Applications",
            "Web Development for Augmented Reality (AR) Experiences",
            "Inclusive Design: Designing for a Diverse User Base",
            "Enhancing Website Interactivity with JavaScript Libraries",
            "Web Scraping Ethics and Legality: A Comprehensive Guide",
            "The Art of Crafting Engaging Microinteractions",
            "Optimizing Mobile Web Performance for Better UX",
            "Understanding Modern SEO Techniques and Algorithms",
            "Creating Effective 404 Pages: Best Practices and Examples",
            "Web Development for Wearable Technology",
            "Building Secure Authentication Flows for Web Apps",
            "Ethical Considerations in AI-Powered Web Applications",
            "Designing Voice User Interfaces (VUI) for Websites",
            "Exploring WebAssembly Text Format (Wat)",
            "Web Components: Reusable UI Elements for Web Development",
            "Implementing Push Notifications in Web Applications",
            "The Intersection of Neuroscience and User Experience",
            "Creating Immersive Web Experiences with Three.js",
            "Web Development for 5G Networks: Opportunities and Challenges",
            "Building Interactive E-Learning Platforms with Web Tech",
            "Exploring Cybersecurity for Web Developers",
            "Progressive Web Apps (PWAs) vs Native Mobile Apps",
        ];

        return [
            'name' => fake()->randomElement($articleTitles),
            'snippet' => fake()->sentence(25),
            'content' => fake()->paragraphs(3, true),
            'active' => true,
            'created_at' => fake()->dateTimeBetween('-3 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-2 year', 'now'),
        ];
    }

}
