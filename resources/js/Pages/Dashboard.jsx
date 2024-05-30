import React, { useState, useEffect } from "react";

function Dashboard({ name, email, avatar, role, page_title, children }) {
  const [isOpenDropdownUser, setIsOpenDropdownUser] = useState(false);
  const [isOpenLogoSideBar, setIsOpenLogoSideBar] = useState(false);

  useEffect(() => {
    document.title = page_title;
  }, [page_title]);

  const getDashboardRoute = () => {
      switch (role){
          case 'admin':
              return "/dashboard";
          case 'doctor' :
              return "/dashboard/doctor/workspace";
          case 'author':
              return "/dashboard/author/workspace";
          default : return "#"
      }
  }

  return (
    <div>
      <nav className="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div className="px-3 py-3 lg:px-5 lg:pl-3">
          <div className="flex items-center justify-between">
            <div className="flex items-center justify-start rtl:justify-end">
              <button
                type="button"
                className="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                onClick={() => setIsOpenLogoSideBar((prevState) => !prevState)}
              >
                <span className="sr-only">Open sidebar</span>
                <svg
                  className="w-6 h-6"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    clipRule="evenodd"
                    fillRule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                  ></path>
                </svg>
              </button>
              <a href="#" className="flex ms-2 md:me-24">
                <img src="/static/logo.png" className="h-8 me-3" alt="Pawspital Logo" />
                <span className="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">
                  Pawspital
                </span>
              </a>
            </div>
            <div className="relative inline-block text-left">
              <button
                type="button"
                className="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                onClick={() => setIsOpenDropdownUser((prevState) => !prevState)}
              >
                <span className="sr-only">Open user menu</span>
                <img className="w-8 h-8 rounded-full" src={avatar} alt="user photo" />
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
                    <p className="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                      {email}
                    </p>
                  </div>
                  <ul className="py-1" role="none">
                    <li>
                      <a
                        href="/dashboard/profile"
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
                        // href="/logout"
                        // onClick={(event) => {
                        //   event.preventDefault();
                        //   document.getElementById("logout-form").submit();
                        // }}
                        className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                        role="menuitem"
                      >
                        Sign out
                      </a>
                      {/*<form id="logout-form" action="/auth/logout" method="POST" style={{ display: "none" }}>*/}
                      {/*  /!* Include CSRF token if needed *!/*/}
                      {/*</form>*/}
                    </li>
                  </ul>
                </div>
              )}
            </div>
          </div>
        </div>
      </nav>

      <aside
        id="logo-sidebar"
        className={`fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform ${
          isOpenLogoSideBar ? "" : "-translate-x-full"
        } bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700`}
        aria-label="Sidebar"
      >
        <div className="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
          <ul className="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li className="py-3 text-gray-500 dark:text-white">Workspace</li>
            <li>
              <a
                href={getDashboardRoute()}
                className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
              >
                <svg
                  className="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 22 21"
                >
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                </svg>
                <span className="ms-3">Dashboard</span>
              </a>
            </li>
            {role === "admin" && (
              <>
                <li>
                  <a
                    href="/pet/index"
                    className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                  >
                    <svg
                      className="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.805 2.199-1.924 5.821.754 8.705l6.184 7.098ZM9.602 7.143c.718-.898 1.564-1.52 2.397-1.52.828 0 1.673.622 2.392 1.52 1.286 1.612 1.266 3.95-.256 5.481l-2.136 2.45-2.137-2.45c-1.52-1.531-1.54-3.87-.256-5.481Z"></path>
                    </svg>
                    <span className="flex-1 ms-3 whitespace-nowrap">Pets</span>
                  </a>
                </li>
                <li>
                  <a
                    href="/employee/index"
                    className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                  >
                    <svg
                      className="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path d="M16 12c2.2 0 4-1.8 4-4S18.2 4 16 4s-4 1.8-4 4 1.8 4 4 4Zm-8 0c2.2 0 4-1.8 4-4S10.2 4 8 4s-4 1.8-4 4 1.8 4 4 4Zm0 2c-2.7 0-8 1.3-8 4v2c0 1.1.9 2 2 2h12.7c-.5-.6-.7-1.3-.7-2H2v-2c0-.6 2.7-2 6-2h4.5c.6-1.5 1.8-2.7 3.5-3.2-.9-.5-1.9-.8-3-.8h-5ZM16 14c-2.2 0-4 1.8-4 4 0 2.2 1.8 4 4 4s4-1.8 4-4c0-2.2-1.8-4-4-4Zm0 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2Z"></path>
                    </svg>
                    <span className="flex-1 ms-3 whitespace-nowrap">Employees</span>
                  </a>
                </li>
              </>
            )}
            {(role === "doctor") && (
              <>
                <li>
                  <a
                    href="/patient/index"
                    className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                  >
                    <svg
                      className="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.805 2.199-1.924 5.821.754 8.705l6.184 7.098ZM9.602 7.143c.718-.898 1.564-1.52 2.397-1.52.828 0 1.673.622 2.392 1.52 1.286 1.612 1.266 3.95-.256 5.481l-2.136 2.45-2.137-2.45c-1.52-1.531-1.54-3.87-.256-5.481Z"></path>
                    </svg>
                    <span className="flex-1 ms-3 whitespace-nowrap">Patients</span>
                  </a>
                </li>
                <li>
                  <a
                    href="/prescription/index"
                    className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                  >
                    <svg
                      className="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path d="M5 1a3 3 0 0 0-3 3v16a3 3 0 0 0 3 3h7a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3H5Zm12 2v2h2v2h2V5h-2V3h-2Zm0 6v2h2v2h2v-2h-2v-2h-2Zm0 6v2h4v-2h-4Z"></path>
                    </svg>
                    <span className="flex-1 ms-3 whitespace-nowrap">Prescriptions</span>
                  </a>
                </li>
              </>
            )}
              {
                  (role === "author") && (
                      <>
                          <li>
                              <a href="/dashboard/author/workspace/post"
                                 className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                  <svg
                                      className="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                      <path
                                          d="M421.073 221.719c-0.578 11.719-9.469 26.188-23.797 40.094v183.25c-0.016 4.719-1.875 8.719-5.016 11.844 -3.156 3.063-7.25 4.875-12.063 4.906H81.558c-4.781-0.031-8.891-1.844-12.047-4.906 -3.141-3.125-4.984-7.125-5-11.844V152.219c0.016-4.703 1.859-8.719 5-11.844 3.156-3.063 7.266-4.875 12.047-4.906h158.609c12.828-16.844 27.781-34.094 44.719-49.906 0.078-0.094 0.141-0.188 0.219-0.281H81.558c-18.75-0.016-35.984 7.531-48.25 19.594 -12.328 12.063-20.016 28.938-20 47.344v292.844c-0.016 18.406 7.672 35.313 20 47.344 12.266 12.063 29.5 19.594 48.25 19.594h298.641c18.781 0 36.016-7.531 48.281-19.594 12.297-12.031 20-28.938 19.984-47.344V203.469c0 0-0.125-0.156-0.328-0.313C440.37 209.813 431.323 216.156 421.073 221.719z"/>
                                      <path
                                          d="M498.058 0c0 0-15.688 23.438-118.156 58.109C275.417 93.469 211.104 237.313 211.104 237.313c-15.484 29.469-76.688 151.906-76.688 151.906 -16.859 31.625 14.031 50.313 32.156 17.656 34.734-62.688 57.156-119.969 109.969-121.594 77.047-2.375 129.734-69.656 113.156-66.531 -21.813 9.5-69.906 0.719-41.578-3.656 68-5.453 109.906-56.563 96.25-60.031 -24.109 9.281-46.594 0.469-51-2.188C513.386 138.281 498.058 0 498.058 0z"/>
                                  </svg>
                                  <span className="flex-1 ms-3 whitespace-nowrap">Post</span>
                              </a>
                          </li>
                          <li>
                              <a href="/dashboard/author/workspace/category"
                                 className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                  <svg
                                      className="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white transition duration-75 icon"
                                      viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                      <path className="fill-current"
                                            d="M27,22.1414V18a2,2,0,0,0-2-2H17V12h2a2.0023,2.0023,0,0,0,2-2V4a2.0023,2.0023,0,0,0-2-2H13a2.002,2.002,0,0,0-2,2v6a2.002,2.002,0,0,0,2,2h2v4H7a2,2,0,0,0-2,2v4.1421a4,4,0,1,0,2,0V18h8v4.142a4,4,0,1,0,2,0V18h8v4.1414a4,4,0,1,0,2,0ZM13,4h6l.001,6H13ZM8,26a2,2,0,1,1-2-2A2.0023,2.0023,0,0,1,8,26Zm10,0a2,2,0,1,1-2-2A2.0027,2.0027,0,0,1,18,26Zm8,2a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,26,28Z"/>
                                      <rect className="hidden" fill="none" width="32" height="32"/>
                                  </svg>

                                  <span className="flex-1 ms-3 whitespace-nowrap">Category</span>
                              </a>
                          </li>
                      </>
                  )
              }
          </ul>

            {
                (role === "admin") && (
                    <>
                        <ul className="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                            <li className="py-3 text-gray-500 dark:text-white">
                                Master Data
                            </li>
                            <li>
                                <a href="/dashboard/master/specialization"
                                   className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg
                                        className="w-6 h-6 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fillRule="evenodd"
                                              d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                                              clipRule="evenodd"/>
                                    </svg>
                                    <span className="ms-3">Master Specialization</span>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/master/pet_type"
                                   className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg
                                        className="w-6 h-6 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fillRule="evenodd"
                                              d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                                              clipRule="evenodd"/>
                                    </svg>
                                    <span className="ms-3">Master Pet Type</span>
                                </a>
                            </li>
                        </ul>
                        <ul className="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                            <li className="py-3 text-gray-500 dark:text-white">
                                Manajemen Inventory
                            </li>
                            <li>
                                <a href="/dashboard/master/inventory_category"
                                   className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg
                                        className="w-6 h-6 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fillRule="evenodd"
                                              d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                                              clipRule="evenodd"/>
                                    </svg>
                                    <span className="ms-3">Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/master/inventory_item"
                                   className="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg
                                        className="w-6 h-6 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fillRule="evenodd"
                                              d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                                              clipRule="evenodd"/>
                                    </svg>
                                    <span className="ms-3">Items</span>
                                </a>
                            </li>

                        </ul>
                        <ul className="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                            <li className="py-3 text-gray-500 dark:text-white">
                                User Role Permission
                            </li>
                            <li>
                                <button type="button"
                                        className="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <svg
                                        className="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 18">
                                        <path
                                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                                    </svg>
                                    <span className="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Users</span>
                                    <svg className="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                              strokeWidth="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <ul id="dropdown-example" className="hidden py-2 space-y-2">
                                    <li>
                                        <a href="/dashboard/user"
                                           className="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">User</a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/user/create"
                                           className="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Admin</a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/doctor"
                                           className="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Dokter</a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/author"
                                           className="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Author</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </>
                )
            }
        </div>
      </aside>

        <div className="p-4 sm:ms-64">
            <div className="p-4 mt-14">
                <div className="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    {children}
                </div>
            </div>
        </div>
    </div>
  );
}

export default Dashboard;
