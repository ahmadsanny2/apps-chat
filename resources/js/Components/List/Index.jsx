export default function Index({ title, data }) {
    return (
        <div className="">
            <div className="text-white">{title}</div>
            {data.map((item) => (
                <div
                    className="p-2 hover:bg-gray-800 rounded cursor-pointer mb-1"
                    key={item.id}
                >
                    <p className="text-white">{item.name}</p>
                </div>
            ))}
        </div>
    );
}
