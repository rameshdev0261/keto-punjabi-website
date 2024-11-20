<template>
    <div>
        <v-app>
            <Navbar />
            <v-main class="front-body">
                <div class="company-header">
                    <h1>Terms & Conditions</h1>
                </div>
                <div class="company-section">
                    <p>
                        The following terms and conditions, together with any
                        referenced documents (collectively, "Terms of Use") form
                        a legal agreement between you and your employer,
                        employees, agents, contractors and any other entity on
                        whose behalf you accept these terms (collectively, “you”
                        and “your”), and ServiceNow, Inc. (“ServiceNow,” “we,”
                        “us” and “our”). The Terms of Use apply to the
                        demonstration services available on the website where
                        these Terms of Use are presented, including any
                        ServiceNow Intellectual Property (as defined below)
                        therein (the “Demo Website”).
                        <br /><br />
                        By accessing or using the Demo Website, or by clicking
                        to accept or agree to the Terms of Use when this option
                        is made available to you, you represent that you have
                        read and understood, and agree to be bound by these
                        Terms of Use. If you do not agree to these Terms of Use,
                        you may not use the Demo Website.
                        <br /><br />
                        Personally identifiable information collected about you
                        by this Demo Website is treated in accordance with the
                        Privacy Policy, which is hereby incorporated into these
                        Terms of Use by reference. If you do not agree to these
                        Terms of Use or the Privacy Policy, you must accept
                        these Terms of Use or access the Demo Website.
                        <br /><br />
                        We reserve the right to terminate or modify the Demo
                        Website in whole or in part, in any manner in our sole
                        discretion, without notice. We will not be liable if,
                        for any reason, all or any part of the Demo Website is
                        unavailable at any time or for any period. From time to
                        time, we may restrict access to all or part of the Demo
                        Website to a subset of permitted users. You are solely
                        responsible for making all arrangements necessary for
                        you to access the Demo Website.
                        <br /><br />
                        You shall use the Demo Website exclusively to test and
                        evaluate the ServiceNow product and service, and you
                        shall access it only through the registration portal,
                        regardless of any previous registration or access. To
                        access portions of the Demo Website or certain
                        resources, you may be asked to provide certain
                        registration details or other information. It is a
                        condition of your use of the Demo Website, and you
                        hereby represent and warrant, that all information you
                        provide is correct, current and complete. You must
                        logout from the Demo Website at the end of each session.
                        You agree that you are solely responsible to us for all
                        activities identified with your access and registration.
                        ServiceNow has the absolute right to disable any user
                        name or password, at any time, for any reason,
                        including, if in our sole discretion we believe that you
                        have failed to comply with any provision of these Terms
                        of Use.
                        <br /><br />
                        The Demo Website is a collection of shared instances
                        that automatically reset on a timed schedule. Anything
                        input by a user of the Demo Website that remains on an
                        instance following your use will be visible and usable
                        to all other users that access the same instance before
                        it is reset. In addition to the rights provided to
                        ServiceNow above, you hereby grant to all users of the
                        Demo Website a royalty‑free, fully‑paid, non‑exclusive,
                        non‑transferable, sub‑licensable, worldwide right to use
                        any data and intellectual property provided by you to
                        each other user of the Demo Website solely to use the
                        Demo Website as described herein.
                    </p>
                </div>
            </v-main>
            <Footer />
        </v-app>
    </div>
</template>

<script>
import Navbar from "./common/Navbar.vue";
import Footer from "./common/Footer.vue";

export default {
    components: {
        Navbar,
        Footer,
    },
    data: () => ({}),
};
</script>

<style></style>
