import Dropdown from "./Dropdown";

export default function Settings({}) {
    return (
        <Dropdown>
            <Dropdown.Trigger>
                <button className="items-center justify-center py-2 rounded-md text-gray-400">
                    <svg
                        className="h-4 w-4"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </Dropdown.Trigger>

            <Dropdown.Content>
                <Dropdown.Link>Log Out</Dropdown.Link>
            </Dropdown.Content>
        </Dropdown>
    );
}
