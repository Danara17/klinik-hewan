import React, { useEffect } from "react";
import Aos from "aos";
import "aos/dist/aos.css";
import { Github, Instagram, Linkedin } from "lucide-react";

export default function Content() {
    useEffect(() => {
        Aos.init({
            duration: 2000,
        });
    }, []);

    const members = [
        {
            name: "Danara Dhasa Caesa",
            university: "Universitas 17 Agustus 1945 Surabaya",
            img: "/static/Team/danara.png",
            aos: "fade-right",
        },
        {
            name: "Muhamad Rafi Prabowo",
            university: "Politeknik Negeri Malang",
            img: "https://mdbcdn.b-cdn.net/img/new/avatars/2.webp",
            aos: "zoom-out",
        },
        {
            name: "Geraldi Nathan",
            university: "Universitas Muhammadiyah Malang",
            img: "/static/team/geraldi.jpg",
            aos: "fade-left",
        },
        {
            name: "M. Arya Suherman",
            university: "Universitas Micro Skill",
            img: "/static/team/arya4.png",
            aos: "fade-right",
        },
        {
            name: "Jesia Esa Christanti",
            university: "Universitas Terbuka Yogyakarta",
            img: "/static/team/jesia.jpg",
            aos: "fade-left",
        },
    ];

    return (
        <>
            <div className="py-20">
                <div className="max-w-screen-xl mx-auto p-5">
                    <div className="flex flex-col gap-12">
                        <div className="text-5xl lg:text-center font-semibold">
                            Meet Our Team
                        </div>
                        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 md:gap-16">
                            {members.map((member, index) => (
                                <div
                                    key={index}
                                    className="max-w-sm md:w-[300px] rounded-[36px] shadow-2xl md:h-96 flex flex-col gap-4 items-center p-6 bg-white transition-transform transform hover:scale-105"
                                    data-aos={member.aos}
                                >
                                    <img
                                        className="rounded-full w-28 h-28"
                                        src={member.img}
                                        alt={member.name}
                                    />
                                    <div className="flex flex-col justify-center text-wrap text-center items-center gap-4">
                                        <span className="lg:text-2xl font-semibold text-wrap">
                                            {member.name}
                                        </span>
                                        <span className="text-wrap text-gray-500">
                                            {member.university}
                                        </span>
                                    </div>
                                    <div className="flex gap-7 pt-8">
                                        <a
                                            href="#"
                                            target="_blank"
                                            className="hover:text-blue-500"
                                        >
                                            <Github />
                                        </a>
                                        <a
                                            href="#"
                                            target="_blank"
                                            className="hover:text-blue-500"
                                        >
                                            <Linkedin />
                                        </a>
                                        <a
                                            href="#"
                                            target="_blank"
                                            className="hover:text-blue-500"
                                        >
                                            <Instagram />
                                        </a>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
