import React from "react";
import pet from "/public/static/bowl.png";
import guk from "/public/static/guk.png";

export default function Hero() {
    const loginRoute = () => {
        window.location.href = "/login";
    };
    return (
        <>
            <div className="min-h-screen bg-white flex justify-center items-center">
                <div className="flex flex-col max-w-fit gap-10  justify-center items-center py-28">
                    <div className="flex flex-col gap-12 p-[42px]">
                        <div className=" flex justify-center items-center text-center ">
                            <div className="max-w-xl flex flex-col mb-12 gap-6 justify-center items-center">
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
                                <img src={guk} alt="" className="h-[32rem]" />
                            </div>
                            <div className="max-w-md">
                                <h1 className="text-2xl font-bold text-blue-700 ">
                                    Layanan Konsultasi Hewan
                                </h1>
                                <p className="py-6 text-blue-600">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Fugiat itaque quis cumque
                                    illo, harum non animi! Tempore nostrum
                                    repudiandae, repellendus tenetur ips
                                </p>

                                <p className="py-6 text-blue-600">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Fugiat itaque quis cumque
                                    illo, harum non animi! Tempore nostrum
                                    repudiandae, repellendus tenetur ips
                                </p>
                            </div>
                        </div>

                        <div className="flex items-center gap-6">
                            <div className="max-w-md flex flex-col gap-2">
                                <h1 className="text-2xl font-bold text-blue-700 ">
                                    Layanan Konsultasi Hewan
                                </h1>
                                <p className="py-6 text-blue-600">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Fugiat itaque quis cumque
                                    illo, harum non animi! Tempore nostrum
                                    repudiandae, repellendus tenetur ips
                                </p>

                                <p className="py-6 text-blue-600">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Fugiat itaque quis cumque
                                    illo, harum non animi! Tempore nostrum
                                    repudiandae, repellendus tenetur ips
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
