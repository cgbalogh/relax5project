
plugin.tx_relax5project_project {
    view {
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5project/Resources/Private/Templates/
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5project/Resources/Private/Partials/
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5project/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5project_project//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_relax5project_dashboard {
    view {
        # cat=plugin.tx_relax5project_dashboard/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5project/Resources/Private/Templates/
        # cat=plugin.tx_relax5project_dashboard/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5project/Resources/Private/Partials/
        # cat=plugin.tx_relax5project_dashboard/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5project/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5project_dashboard//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_relax5project_mockup {
    view {
        # cat=plugin.tx_relax5project_mockup/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5project/Resources/Private/Templates/
        # cat=plugin.tx_relax5project_mockup/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5project/Resources/Private/Partials/
        # cat=plugin.tx_relax5project_mockup/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5project/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5project_mockup//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_relax5project_xmlexport {
    view {
        # cat=plugin.tx_relax5project_xmlexport/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5project/Resources/Private/Templates/
        # cat=plugin.tx_relax5project_xmlexport/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5project/Resources/Private/Partials/
        # cat=plugin.tx_relax5project_xmlexport/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5project/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5project_xmlexport//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

plugin.tx_relax5project_project {
    view {
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5core/Resources/Private/Templates/
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5core/Resources/Private/Partials/
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5core/Resources/Private/Layouts/
    }

    settings {
        # cat=plugin.tx_relax5project_project//b; type=int; label=Project Show PID
        projectShowPid =

        # cat=plugin.tx_relax5project_project//c1; type=int; label=Project List Show PID
        projectListShowPid =

        # cat=plugin.tx_relax5project_project//c2; type=int; label=Alternate Project List Show PID (grouped view)
        altProjectListShowPid =

        # cat=plugin.tx_relax5project_project//c3; type=string; label=Time Horizon Intervals
        timeHorizonIntervalList = P3M, P3M, P3M, P3M, P3M, P3M, P3M, P3M, P1Y, P1Y, P1Y, P1Y
        # cat=plugin.tx_relax5project_project//d; type=string; label=Time Horizon Format
        timeHorizonFormat = Y Q, Y Q, Y Q, Y Q, Y Q, Y Q, Y Q, Y Q, Y, Y, Y, Y
        # cat=plugin.tx_relax5project_project//e; type=string; label=Time Horizon Quarter Names
        timeHorizonQuarters = Frühjahr, Sommer, Herbst, Winter

        # cat=plugin.tx_relax5project_project//g; type=int; label=Dashboard: Pending Appointments List PID
        appointmentsPendingPid =
        # cat=plugin.tx_relax5project_project//h; type=int; label=Dashboard: Person List PID
        personListPid =
        # cat=plugin.tx_relax5project_project//i; type=int; label=Dashboard: Company List PID
        companyListPid =
    }
}

plugin.tx_relax5project_mockup {
    view {
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5core/Resources/Private/Templates/
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5core/Resources/Private/Partials/
        # cat=plugin.tx_relax5project_project/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5core/Resources/Private/Layouts/
    }

    settings {
        # cat=plugin.tx_relax5project_project//b; type=int; label=Single Project Show PID
        projectShowPid =

        # cat=plugin.tx_relax5project_project//d; type=string; label=Time Horizon Intervals
        timeHorizonIntervalList = P3M, P3M, P3M, P3M, P3M, P3M, P3M, P3M, P1Y, P1Y, P1Y, P1Y
        # cat=plugin.tx_relax5project_project//e; type=string; label=Time Horizon Format
        timeHorizonFormat = Y Q, Y Q, Y Q, Y Q, Y Q, Y Q, Y Q, Y Q, Y, Y, Y, Y
        # cat=plugin.tx_relax5project_project//f; type=string; label=Time Horizon Quarter Names
        timeHorizonQuarters = Frühjahr, Sommer, Herbst, Winter

    }
}