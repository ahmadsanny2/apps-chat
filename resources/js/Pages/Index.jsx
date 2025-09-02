import Settings from "@/Components/Settings";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Welcome({ auth }) {
    return (
        <AuthenticatedLayout>
            <Head title="Welcome" />

            <div className="flex">
                <div className="w-2/6 bg-gray-900 border-r border-gray-800">
                    <div className="pt-4 flex flex-col h-screen">
                        <div className="px-4">
                            <div className="flex justify-between mb-2">
                                <h1 className="text-white text-xl font-bold"></h1>
                                <div className="">
                                    <Settings />
                                </div>
                            </div>
                            # Search #
                        </div>
                        <div className="flex-1 px-4 overflow-y-auto">
                            # Room #
                        </div>
                    </div>
                </div>
                <div className="relative w-4/6"># Chat #</div>
            </div>
        </AuthenticatedLayout>
    );
}
