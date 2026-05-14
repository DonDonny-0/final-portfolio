import { BaseLayout } from "../Layout/BaseLayout";

export default function About(props) {
    return (
        <BaseLayout>
            <h1>this is the about page</h1>
            <pre>{JSON.stringify(props.user, null, 2)}</pre>
        </BaseLayout>
    )
}