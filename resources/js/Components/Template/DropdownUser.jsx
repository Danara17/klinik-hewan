import React, { useState } from 'react';

const DropdownComponent = ({ email, name }) => {
    const [isOpenDropdownUser, setIsOpenDropdownUser] = useState(false);

    return (
        <div className="relative inline-block text-left">
            <button
                type="button"
                className="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                onClick={() => {
                    setIsOpenDropdownUser((prevState) => !prevState);
                }}
            >
                <span className="sr-only">Open user menu</span>
                <img className="w-8 h-8 rounded-full" src={email} alt="user photo" />
            </button>
            {isOpenDropdownUser && (
                <div
                    className="absolute right-0 z-50 mt-2 w-48 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-700 dark:divide-gray-600"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="menu-button"
                    tabIndex="-1"
                >
                    <div className="px-4 py-3" role="none">
                        <p className="text-sm text-gray-900 dark:text-white" role="none">
                            {name}
                        </p>
                        <p
                            className="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                            role="none"
                        >
                            {email}
                        </p>
                    </div>
                    <ul className="py-1" role="none">
                        <li>
                            <a
                                href="/profile/show"
                                className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem"
                            >
                                Profile
                            </a>
                        </li>
                        <li>
                            <button
                                type="button"
                                id="darkModeToggle"
                                className="w-full text-start block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem"
                            >
                                Dark Mode - Off
                            </button>
                        </li>
                        <li>
                            <a
                                href="/auth/logout"
                                onClick={(event) => {
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                }}
                                className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem"
                            >
                                Sign out
                            </a>
                            <form
                                id="logout-form"
                                action="/auth/logout"
                                method="POST"
                                style={{ display: 'none' }}
                            >
                                {/* Include CSRF token if needed */}
                            </form>
                        </li>
                    </ul>
                </div>
            )}
        </div>
    );
};

export default DropdownComponent;
