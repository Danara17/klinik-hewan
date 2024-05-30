import React, { useEffect } from "react";
import Dashboard from "../../Dashboard.jsx";

export default function Index({
    name,
    email,
    role,
    avatar,
    page_title,
    dataUser,
    success,
    error,
    job,
}) {
    useEffect(() => {
        console.log("Job Data:", job);
    }, [job]);

    return (
        <Dashboard
            name={name}
            email={email}
            role={role}
            avatar={avatar}
            page_title={page_title}
            className="bg-slate-50 dark:bg-gray-800"
        >
            <div className="mt-16 md:mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                {[...Array(3)].map((_, index) => (
                    <div
                        key={index}
                        className="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm text-center"
                    >
                        <div className="text-2xl text-gray-400 dark:text-white">
                            1
                        </div>
                        <div className="text-xl font-semibold text-black dark:text-white">
                            Job Queue
                        </div>
                    </div>
                ))}
            </div>

            <div className="grid grid-cols-1 gap-4 mt-4">
                <div className="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm">
                    <div className="font-semibold text-black dark:text-white mb-3">
                        Periksa Hewan
                    </div>
                    {job.map((item) => (
                        <a
                            key={item.id}
                            href={`/medical_record/check/${item.id}`}
                            className="p-3 flex border gap-4 shadow-sm hover:shadow-md mb-3"
                        >
                            <div className="h-36 w-36 overflow-hidden">
                                {item.pet.photo ? (
                                    <img
                                        src={`/storage/client_pets_gallery/${item.pet.photo}`}
                                        alt={item.name}
                                        className="h-full w-full object-cover"
                                    />
                                ) : (
                                    <div className="h-full w-full bg-gray-200 flex items-center justify-center">
                                        <span className="text-gray-500">
                                            No Image
                                        </span>
                                    </div>
                                )}
                            </div>
                            <div>
                                <div className="text-lg font-semibold text-black dark:text-white">
                                    <span className="mr-2">
                                        {item.pet.name}
                                    </span>
                                    <span className="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        menunggu pemeriksaan anda
                                    </span>
                                </div>
                                <div className="text-base text-gray-600 dark:text-white">
                                    <strong>Keluhan: </strong> {item.complaint}
                                </div>
                            </div>
                        </a>
                    ))}
                </div>
            </div>
        </Dashboard>
    );
}
