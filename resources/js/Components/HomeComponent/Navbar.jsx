import React, { useContext, useState } from "react"; // Import useContext from 'react'
import { Link } from "@inertiajs/inertia-react";
import Logo from "/public/static/logo.png";

const Navbar = ({ role }) => {
    const [isOpen, setIsOpen] = useState(false);

    const getButtonText = () => {
        if (role) {
            return "Dashboard";
        } else {
            return "Get Started";
        }
    };

    const getDashboardUrl = () => {
        if (role) {
            if (role === "admin") {
                return "/dashboard";
            } else if (role === "author") {
                return "/dashboard/author/workspace";
            } else if (role === "doctor") {
                return "/dashboard/doctor/workspace";
            } else if (role === "user") {
                return "/dashboard/user/preview";
            }
        }
        return "/login";
    };

    return (
        <>
            <nav className="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
                <div className="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a
                        href="/"
                        className="flex items-center space-x-3 rtl:space-x-reverse"
                    >
                        <img src={Logo} className="h-8" alt="Flowbite Logo" />
                        <span className="self-center text-2xl font-semibold whitespace-nowrap text-blue-700">
                            Pawspital
                        </span>
                    </a>
                    <div className="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button
                            onClick={() =>
                                (window.location.href = getDashboardUrl())
                            }
                            type="button"
                            className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                        font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            {getButtonText()}
                        </button>
                    </div>
                    <div
                        className={`items-center justify-between ${
                            isOpen ? "block" : "hidden"
                        } w-full md:flex md:w-auto md:order-1`}
                        id="navbar-sticky"
                    >
                        <ul
                            className="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50
                     md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 
                     md:dark:bg-gray-900 dark:border-gray-700"
                        >
                            <li>
                                <a
                                    href="/article"
                                    className="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent
                                 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700
                                  dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                >
                                    Article
                                </a>
                            </li>
                            <li>
                                <a
                                    href="/about"
                                    className="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent
                                 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700
                                  dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                >
                                    About
                                </a>
                            </li>
                            <li>
                                <a
                                    href="/faq"
                                    className="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent
                                 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700
                                  dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                >
                                    Faq
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </>
    );
};

export default Navbar;
