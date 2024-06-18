import React from "react";

export default function Card({ logo, title, description }) {
    return (
        <div className="p-6 hover:bg-main hover:text-white ease-out duration-200 w-full max-w-xs md:w-[350px] shadow-lg rounded-lg">
            <div className="flex flex-col gap-2">
                <div className="flex gap-3 items-center">
                    {logo}
                    <span>{title}</span>
                </div>
                <div className="flex-grow">{description}</div>
                <div>
                    <span className="text-sm font-medium">Get Service</span>
                </div>
            </div>
        </div>
    );
}
