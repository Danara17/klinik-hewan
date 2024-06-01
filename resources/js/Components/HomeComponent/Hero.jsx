import React from "react";
import pet from "/public/static/bowl.jpg";
import guk from "/public/static/dokter.jpg";

export default function Hero() {
    const loginRoute = () => {
        window.location.href = "/login";
    };
    return (
        <>
            <div className="min-h-screen  flex justify-center items-center">
                <div className="flex flex-col max-w-fit gap-10  justify-center items-center py-28">
                    <div className="flex flex-col gap-12 p-[42px]">
                        <div className=" flex justify-center items-center text-center ">
                            <div className="max-w-xl flex flex-col mb-11 gap-5 justify-center items-center">
                                <div className="flex flex-col">
                                    <h1 className="text-5xl font-bold text-blue-700 ">
                                        Konsultasi Digital Hewan
                                    </h1>
                                    <h1 className="text-5xl font-bold text-blue-700">
                                        Pawspital
                                    </h1>
                                </div>
                                <button
                                    onClick={loginRoute}
                                    className="border py-4 px-12 max-w-full rounded-md bg-blue-600 text-white text-xl"
                                >
                                    Urus Sekarang
                                </button>
                            </div>
                        </div>

                        <div className="flex items-center gap-12">
                            <div className="hidden md:inline">
                                <img src={guk} alt="" className="h-[30rem]" />
                            </div>
                            <div className="max-w-md">
                                <h1 className="text-2xl font-bold text-blue-700 ">
                                    Layanan Konsultasi Hewan
                                </h1>
                                <p className="py-6 text-blue-600">
                                Kami menawarkan konsultasi hewan oleh tim dokter hewan kami yang berpengalaman. Kami membantu pemilik memahami dan merawat hewan peliharaan mereka. Layanan kami mencakup kesehatan, nutrisi, perilaku, dan perawatan umum.
                                </p>

                                <p className="py-6 text-blue-600">
                                Hubungi kami hari ini untuk membuat janji atau untuk mengetahui lebih lanjut tentang layanan konsultasi hewan kami. Kami berharap dapat bertemu dengan Anda dan hewan peliharaan Anda segera.
                                </p>
                            </div>
                        </div>

                        <div className="flex items-center gap-6">
                            <div className="max-w-md flex flex-col gap-2">
                                <h1 className="text-2xl font-bold text-blue-700 ">
                                Pentingnya Kesehatan dan Mental Hewan Peliharaan
                                </h1>
                                <p className="py-6 text-blue-600">
                                Kesehatan fisik dan mental hewan peliharaan sama pentingnya. Kesehatan fisik dapat dipantau melalui pemeriksaan rutin dan diet seimbang. Sementara itu, stres dan kecemasan dapat mempengaruhi kesehatan mental hewan peliharaan Anda.
                                </p>

                                <p className="py-6 text-blue-600">
                                Hubungi kami untuk mengetahui lebih lanjut tentang bagaimana kami dapat membantu meningkatkan kesehatan dan kesejahteraan mental hewan peliharaan Anda. Kami berkomitmen untuk memberikan perawatan terbaik untuk hewan peliharaan Anda.
                                </p>
                            </div>
                            <div className="flex  ">
                                <div className="hidden md:inline">
                                    <img
                                        src={pet}
                                        alt=""
                                        className="h-[32rem]"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
