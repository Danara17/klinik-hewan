import React, { useState, useEffect } from "react";
import Logo from "/public/static/logo.png";
import { CircleHelp, Contact, HomeIcon, Newspaper } from "lucide-react";

const Navbar = () => {
    const [user, setUser] = useState(null);
    const [isOpen, setIsOpen] = useState(false);

    useEffect(() => {
        const fetchUser = async () => {
            try {
                const response = await fetch("/user");
                if (response.ok) {
                    const userData = await response.json();
                    setUser(userData);
                }
            } catch (error) {
                console.error("Error fetching user data:", error);
            }
        };

        fetchUser();
    }, []);

    const getButtonText = () => {
        return user ? "Dashboard" : "Get Started";
    };

    const getDashboardUrl = () => {
        if (user) {
            if (user.role === "admin") {
                return "/dashboard";
            } else if (user.role === "author") {
                return "/dashboard/author/workspace";
            } else if (user.role === "doctor") {
                return "/dashboard/doctor/workspace";
            } else if (user.role === "user") {
                return "/dashboard/user/preview";
            }
        }
        return "/login";
    };

    return (
        <nav className="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div className="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a
                    href="/"
                    className="flex items-center space-x-3 rtl:space-x-reverse"
                >
                    <img
                        src={Logo}
                        className="h-7 sm:h-8"
                        alt="Flowbite Logo"
                    />
                    <span className="text-sm sm:text-2xl font-semibold whitespace-nowrap text-blue-700">
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
                        font-medium rounded-lg  text-sm px-2 sm:px-4 sm:py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        {getButtonText()}
                    </button>
                    <button
                        onClick={() => setIsOpen(!isOpen)}
                        type="button"
                        className="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-10
                             focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky"
                        aria-expanded="false"
                    >
                        <span className="sr-only">Open main menu</span>
                        <svg
                            className="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
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

            {/* Mobile Navbar */}
            <div className="bottom-0 fixed bg-main w-full p-3 z-20 text-white rounded-t-xl sm:hidden">
                <div className="flex items-center justify-between mx-auto w-full">
                    <a
                        href="/"
                        className="flex flex-col justify-center items-center gap-1"
                    >
                        <HomeIcon className="w-5" />
                        <span className="text-xs">Home</span>
                    </a>
                    <a
                        href="/article"
                        className="flex flex-col justify-center items-center gap-1"
                    >
                        <Newspaper className="w-5" />
                        <span className="text-xs">Article</span>
                    </a>
                    <a
                        href="/about"
                        className="flex flex-col justify-center items-center gap-1"
                    >
                        <Contact className="w-5" />
                        <span className="text-xs">About Us</span>
                    </a>
                    <a
                        href="/faq"
                        className="flex flex-col justify-center items-center gap-1"
                    >
                        <CircleHelp className="w-5" />
                        <span className="text-xs">FAQ</span>
                    </a>
                </div>
            </div>
            {/* Mobile Navbar */}
        </nav>
    );
};

export default Navbar;
