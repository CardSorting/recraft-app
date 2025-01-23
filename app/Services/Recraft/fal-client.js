import { fal } from "@fal-ai/client";

export async function generateImage(input) {
    try {
        const result = await fal.subscribe("fal-ai/recraft-v3", {
            input,
            logs: true,
            onQueueUpdate: (update) => {
                if (update.status === "IN_PROGRESS") {
                    update.logs.map((log) => log.message).forEach(console.log);
                }
            },
        });
        return { success: true, data: result.data, requestId: result.requestId };
    } catch (error) {
        return { success: false, error: error.message };
    }
}

export async function getStatus(requestId) {
    try {
        const status = await fal.queue.status("fal-ai/recraft-v3", {
            requestId,
            logs: true,
        });
        return { success: true, data: status };
    } catch (error) {
        return { success: false, error: error.message };
    }
}

// Configure FAL client with API key from environment
fal.config({
    credentials: process.env.FAL_KEY
});
