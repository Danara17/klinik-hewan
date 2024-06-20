import React, { useEffect } from "react";
import Card from "./Card";
import Aos from "aos";
import "aos/dist/aos.css";
import {
    Bird,
    Cat,
    Clock,
    Dog,
    Fish,
    MapPinIcon,
    Phone,
    Rabbit,
    Snail,
} from "lucide-react";

export default function Hero() {
    const cardData = [
        {
            logo: <Cat />,
            title: "Wellness Exams",
            description:
                "Wellness examinations provide an excellent opportunity for us to develop a health profile for your pet.",
        },
        {
            logo: <Dog />,
            title: "Vaccinations",
            description:
                "Vaccinations help protect your pet from various diseases and health conditions.",
        },
        {
            logo: <Bird />,
            title: "Surgical Procedures",
            description:
                "We provide a range of surgical procedures to address your pet's health needs.",
        },
        {
            logo: <Rabbit />,
            title: "Dental Care",
            description:
                "Regular dental care is essential for your pet's overall health and make sure your pet teeth is good.",
        },
        {
            logo: <Fish />,
            title: "Emergency Services",
            description:
                "Our emergency services are available to handle urgent health issues and make sure everything fine.",
        },
        {
            logo: <Snail />,
            title: "Nutritional Counseling",
            description:
                "We offer nutritional counseling to ensure your pet's diet meets their health requirements.",
        },
    ];

    useEffect(() => {
        Aos.init({
            duration: 2000,
        });
    }, []);

    return (
        <>
            <div className=" min-h-screen flex justify-center relative overflow-hidden">
                {/* Desktop Waves */}
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1440 320"
                    className="absolute top-0 hidden sm:inline lg:h-2/4"
                >
                    <path
                        fill="#083AA9"
                        fillOpacity="1"
                        d="M0,320L80,288C160,256,320,192,480,186.7C640,181,800,235,960,224C1120,213,1280,139,1360,101.3L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"
                    ></path>
                </svg>
                {/* Desktop Waves */}

                {/* Mobile Waves */}
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1440 320"
                    className="absolute top-0 h-[18%] sm:hidden"
                >
                    <path
                        fill="#083AA9"
                        fillOpacity="1"
                        d="M0,160L30,181.3C60,203,120,245,180,240C240,235,300,181,360,165.3C420,149,480,171,540,202.7C600,235,660,277,720,282.7C780,288,840,256,900,245.3C960,235,1020,245,1080,240C1140,235,1200,213,1260,181.3C1320,149,1380,107,1410,85.3L1440,64L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"
                    ></path>
                </svg>
                {/* Mobile Waves */}

                <div className="flex flex-col max-w-fit gap-10 justify-center items-center py-28 px-4 sm:px-8 md:px-16 relative">
                    <div className="flex flex-col gap-12 p-4 sm:p-6 md:p-8 lg:p-12 ">
                        <div className="flex flex-col lg:flex-row items-center gap-4 lg:gap-8">
                            <div
                                className="bg-white shadow-xl rounded-full w-72 h-72 overflow-hidden hidden lg:inline"
                                data-aos="fade-right"
                            >
                                <img
                                    src="/static/cat.jpg"
                                    alt="Cat"
                                    className="object-cover w-full h-full"
                                />
                            </div>
                            <div
                                className="flex flex-col items-center gap-4 md:gap-6 lg:gap-8 text-center"
                                data-aos="zoom-out"
                            >
                                <div>
                                    <h1 className="text-2xl text-white sm:text-main lg:text-white sm:text-4xl md:text-5xl font-bold">
                                        Trusted Petcare in The World
                                    </h1>
                                </div>
                                <div className="flex flex-col gap-1 items-center">
                                    <span className="text-sm text-white sm:text-black lg:text-white break-words sm:text-lg md:text-xl text-center">
                                        Caring for your pets isn't just our job;
                                        it's our passion.
                                    </span>
                                    <span className="text-sm text-white sm:text-black lg:text-white break-words sm:text-base md:text-xl text-center">
                                        From wellness exams to vaccines and
                                        surgical procedures, our commitment to
                                        your pet is our speciality.
                                    </span>
                                </div>

                                <div className="hidden sm:flex gap-4 sm:flex-row sm:gap-16">
                                    <div className="flex items-center gap-5 ">
                                        <Phone className="sm:text-blue lg:text-white" />
                                        <div className="grid text-xs sm:text-main lg:text-white">
                                            <span>Phone</span>
                                            <span>(62)91233</span>
                                        </div>
                                    </div>

                                    <div className="flex items-center gap-5 ">
                                        <MapPinIcon className="sm:text-blue lg:text-white" />
                                        <div className="grid text-xs sm:text-main lg:text-white">
                                            <span>Address</span>
                                            <span>
                                                Jl Pegangsaan Timur No 56
                                            </span>
                                        </div>
                                    </div>

                                    <div className="flex items-center gap-5 ">
                                        <Clock className="sm:text-blue lg:text-white" />
                                        <div className="grid text-xs sm:text-main lg:text-white">
                                            <span>Open Hours</span>
                                            <span>
                                                Mon-Fri : 09.00 WIB - 20.00 WIB
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                className="bg-white shadow-xl rounded-full w-72 h-72 overflow-hidden hidden lg:inline"
                                data-aos="fade-left"
                            >
                                <img
                                    src="/static/dogo.jpg"
                                    alt="Cat"
                                    className="object-cover w-full h-full"
                                />
                            </div>
                        </div>

                        <div className="flex flex-col items-center gap-2 mt-16 md:mt-24 lg:mt-28 relative z-10">
                            <div className="flex flex-col gap-10 md:gap-16 lg:gap-20">
                                <div className="flex flex-col items-center gap-2">
                                    <div
                                        className="flex flex-col items-center gap-2 mt-14 sm:mt-0"
                                        data-aos="zoom-out"
                                    >
                                        <span className="text-main font-medium text-base md:text-xl">
                                            Our Services
                                        </span>
                                        <span className="font-bold text-sm md:text-2xl lg:text-3xl">
                                            All Pet Care Services
                                        </span>
                                    </div>

                                    <div
                                        className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4 lg:gap-6"
                                        data-aos="zoom-in"
                                    >
                                        {cardData.map((card, index) => (
                                            <Card
                                                key={index}
                                                logo={card.logo}
                                                title={card.title}
                                                description={card.description}
                                            />
                                        ))}
                                    </div>
                                </div>

                                <div className="flex justify-center items-center">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2966979876933!2d112.72921451109234!3d-7.320531492657124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6e5d6a4119%3A0xf4b8a16cd623796e!2sPT.%20OTAK%20KANAN!5e0!3m2!1sid!2sid!4v1718503871805!5m2!1sid!2sid"
                                        height="450"
                                        allowFullScreen=""
                                        loading="lazy"
                                        referrerPolicy="no-referrer-when-downgrade"
                                        className="w-full"
                                        data-aos="zoom-out"
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
