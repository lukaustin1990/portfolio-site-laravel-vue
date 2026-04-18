import React from "react";
import { createRoot } from "react-dom/client";
import FadeInOnScroll from "../components/FadeInOnScroll";
import TimeLineCard from "../components/TimelineCard";
import {$} from "jquery";

function AboutMeHero() {
    return (        
        <div className="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div className="col-10 col-sm-8 col-lg-6">
                <FadeInOnScroll>
                    <img src="/images/bootstrap-themes.png" className="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy"/>
                </FadeInOnScroll>
            </div>
            <div className="col-lg-6">
                <FadeInOnScroll>
                    <h1 className="display-1 fw-bold lh-1 mb-3">About Me</h1>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.2}>
                    <p className="lead">Versatile web developer with 9+ years experience designing, building and maintaining customer-facing websites and business-critical web applications. Skilled in both backend and frontend development, with experience in database management and API integration. Focused on delivering solutions that enhance the user experience and support business operations, with additional experience providing IT support to staff across multiple departments.</p>
                </FadeInOnScroll>
            </div>
    </div>
    )
}

function AboutTimeline() {
    return (
        <ul className="timeline">
            <TimeLineCard>
                <FadeInOnScroll>
                    <h5 className="card-subtitle text-secondary mb-1">March 2017 - April 2026</h5>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.2}>
                    <h6 className="card-subtitle text-secondary mb-2">Target Components Ltd</h6>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.4}>
                    <h2 className="card-title mb-3">IT Programmer</h2>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.6}>
                    <b className="card-text m-0 font-weight-bold">Responsibilities:</b>
                    <ul>
                        <li>Design, develop, and maintain internal business systems and customer-facing websites using PHP, ASP (Classic) and JavaScript.</li>
                        <li>Develop internal scripts to allow the automation of tasks using Python & VBScript.</li>
                        <li>Manage and optimise databases (MySQL, MSSQL) for system performance and scalability.</li>
                        <li>Integrate external REST APIs to extend system functionality and automate processes.</li>
                    </ul>
                    <b className="card-text m-0 font-weight-bold">Role later expanded:</b>
                    <ul>
                        <li>Provided IT support across multiple departments, assisting users with system and technical issues.</li>
                        <li>Diagnosed and resolved software, system, and user-related problems.</li>
                    </ul>                

                    <div className="divider my-4"></div>
    
                    <b className="card-text m-0 font-weight-bold">Key achievements:</b>
                    <ul>
                        <li>Built a reporting system enabling non-technical users to generate complex reports, reducing reliance on development support and increasing efficiency across multiple departments.</li>
                        <li>Designed and implemented a unified customer service and returns system, improving workflow efficiency and streamlining internal processes</li>
                        <li>Developed an internal helpdesk system supporting multiple departments, each with tailored functionality</li>
                        <li>Redesigned CRM and administration systems to better align with evolving business needs.</li>
                        <li>Integrated MailJet to support GDPR compliant marketing processes.</li>
                        <li>Implemented analytics tracking (including Google Analytics) alongside user consent for third-party cookies, ensuring compliance while maintaining data visibility.</li>
                        <li>Provided IT support to staff across multiple departments, resolving technical issues and ensuring smooth operation of IT systems.</li>
                    </ul>
                </FadeInOnScroll>
            </TimeLineCard>
            <TimeLineCard direction="right">
                <FadeInOnScroll>
                    <h5 className="card-subtitle text-secondary mb-1">2015 - 2016</h5>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.2}>
                    <h6 className="card-subtitle text-secondary mb-2">New College Pontefract</h6>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.4}>
                    <table className="table">
                        <tbody>
                            <tr>
                                <th scope="row">QCF BTEC Level 3 90 Credit Diploma in Creative Media Production</th>
                                <td>Distinction* Distinction*</td>
                            </tr>
                            <tr>
                                <th scope="row">QCF BTEC Extended Diploma in Creative Media Production</th>
                                <td>Distinction* Distinction* Distinction*</td>
                            </tr>
                        </tbody>
                    </table>
                </FadeInOnScroll>
            </TimeLineCard>
            <TimeLineCard direction="left">
                <FadeInOnScroll>
                    <h5 className="card-subtitle text-secondary mb-1">2014</h5>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.2}>
                    <h6 className="card-subtitle text-secondary mb-2">Airedale Academy</h6>
                </FadeInOnScroll>
                <FadeInOnScroll delay={0.4}>
                    <table className="table">
                        <tbody>
                            <tr>
                                <th scope="row">BTEC Ext Certificate in Business</th>
                                <td>Distinction</td>
                            </tr>
                            <tr>
                                <th scope="row">GCSE English Language</th>
                                <td>C</td>
                            </tr>
                            <tr>
                                <th scope="row">GCSE Mathematics</th>
                                <td>B</td>
                            </tr>
                            <tr>
                                <th scope="row">GCSE Science (Additional)</th>
                                <td>B</td>
                            </tr>
                            <tr>
                                <th scope="row">OCR Level 2 National Award in ICT</th>
                                <td>Merit</td>
                            </tr>
                        </tbody>
                    </table>
                </FadeInOnScroll>
            </TimeLineCard>
        </ul>
    )
}

$(document).ready(function () {
    const about_me_container = document.getElementById("about-me-hero");
    const about_timeline_container = document.getElementById("about-timeline");

    if (about_me_container) {
        createRoot(about_me_container).render(<AboutMeHero />);
    }

    if (about_timeline_container) {
        createRoot(about_timeline_container).render(<AboutTimeline />);
    }
});