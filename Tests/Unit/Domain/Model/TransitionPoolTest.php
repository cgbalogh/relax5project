<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class TransitionPoolTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\TransitionPool
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\TransitionPool();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowProjectOwnerReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowProjectOwner()
        );
    }

    /**
     * @test
     */
    public function setAllowProjectOwnerForBoolSetsAllowProjectOwner()
    {
        $this->subject->setAllowProjectOwner(true);

        self::assertAttributeEquals(
            true,
            'allowProjectOwner',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowStateOwnerReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowStateOwner()
        );
    }

    /**
     * @test
     */
    public function setAllowStateOwnerForBoolSetsAllowStateOwner()
    {
        $this->subject->setAllowStateOwner(true);

        self::assertAttributeEquals(
            true,
            'allowStateOwner',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowParentOwnerReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowParentOwner()
        );
    }

    /**
     * @test
     */
    public function setAllowParentOwnerForBoolSetsAllowParentOwner()
    {
        $this->subject->setAllowParentOwner(true);

        self::assertAttributeEquals(
            true,
            'allowParentOwner',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowOnceReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowOnce()
        );
    }

    /**
     * @test
     */
    public function setAllowOnceForBoolSetsAllowOnce()
    {
        $this->subject->setAllowOnce(true);

        self::assertAttributeEquals(
            true,
            'allowOnce',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowCurrentStateOnlyReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowCurrentStateOnly()
        );
    }

    /**
     * @test
     */
    public function setAllowCurrentStateOnlyForBoolSetsAllowCurrentStateOnly()
    {
        $this->subject->setAllowCurrentStateOnly(true);

        self::assertAttributeEquals(
            true,
            'allowCurrentStateOnly',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowIfForwardedReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAllowIfForwarded()
        );
    }

    /**
     * @test
     */
    public function setAllowIfForwardedForIntSetsAllowIfForwarded()
    {
        $this->subject->setAllowIfForwarded(12);

        self::assertAttributeEquals(
            12,
            'allowIfForwarded',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowWithAppointmentReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAllowWithAppointment()
        );
    }

    /**
     * @test
     */
    public function setAllowWithAppointmentForIntSetsAllowWithAppointment()
    {
        $this->subject->setAllowWithAppointment(12);

        self::assertAttributeEquals(
            12,
            'allowWithAppointment',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDenyIfDoneReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDenyIfDone()
        );
    }

    /**
     * @test
     */
    public function setDenyIfDoneForBoolSetsDenyIfDone()
    {
        $this->subject->setDenyIfDone(true);

        self::assertAttributeEquals(
            true,
            'denyIfDone',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getConditionExpressionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getConditionExpression()
        );
    }

    /**
     * @test
     */
    public function setConditionExpressionForStringSetsConditionExpression()
    {
        $this->subject->setConditionExpression('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'conditionExpression',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getConditionModeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getConditionMode()
        );
    }

    /**
     * @test
     */
    public function setConditionModeForIntSetsConditionMode()
    {
        $this->subject->setConditionMode(12);

        self::assertAttributeEquals(
            12,
            'conditionMode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getConditionMessageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getConditionMessage()
        );
    }

    /**
     * @test
     */
    public function setConditionMessageForStringSetsConditionMessage()
    {
        $this->subject->setConditionMessage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'conditionMessage',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDebugReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDebug()
        );
    }

    /**
     * @test
     */
    public function setDebugForBoolSetsDebug()
    {
        $this->subject->setDebug(true);

        self::assertAttributeEquals(
            true,
            'debug',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEnableOnResultReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getEnableOnResult()
        );
    }

    /**
     * @test
     */
    public function setEnableOnResultForIntSetsEnableOnResult()
    {
        $this->subject->setEnableOnResult(12);

        self::assertAttributeEquals(
            12,
            'enableOnResult',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEnableOnNextActionReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getEnableOnNextAction()
        );
    }

    /**
     * @test
     */
    public function setEnableOnNextActionForIntSetsEnableOnNextAction()
    {
        $this->subject->setEnableOnNextAction(12);

        self::assertAttributeEquals(
            12,
            'enableOnNextAction',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getButtonReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getButton()
        );
    }

    /**
     * @test
     */
    public function setButtonForFileReferenceSetsButton()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setButton($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'button',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGlobalReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getGlobal()
        );
    }

    /**
     * @test
     */
    public function setGlobalForBoolSetsGlobal()
    {
        $this->subject->setGlobal(true);

        self::assertAttributeEquals(
            true,
            'global',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMetaReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getMeta()
        );
    }

    /**
     * @test
     */
    public function setMetaForBoolSetsMeta()
    {
        $this->subject->setMeta(true);

        self::assertAttributeEquals(
            true,
            'meta',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getActionsReturnsInitialValueForActionPool()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getActions()
        );
    }

    /**
     * @test
     */
    public function setActionsForObjectStorageContainingActionPoolSetsActions()
    {
        $action = new \CGB\Relax5project\Domain\Model\ActionPool();
        $objectStorageHoldingExactlyOneActions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneActions->attach($action);
        $this->subject->setActions($objectStorageHoldingExactlyOneActions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneActions,
            'actions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addActionToObjectStorageHoldingActions()
    {
        $action = new \CGB\Relax5project\Domain\Model\ActionPool();
        $actionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $actionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($action));
        $this->inject($this->subject, 'actions', $actionsObjectStorageMock);

        $this->subject->addAction($action);
    }

    /**
     * @test
     */
    public function removeActionFromObjectStorageHoldingActions()
    {
        $action = new \CGB\Relax5project\Domain\Model\ActionPool();
        $actionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $actionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($action));
        $this->inject($this->subject, 'actions', $actionsObjectStorageMock);

        $this->subject->removeAction($action);
    }

    /**
     * @test
     */
    public function getNextstateReturnsInitialValueForStatePool()
    {
        self::assertEquals(
            null,
            $this->subject->getNextstate()
        );
    }

    /**
     * @test
     */
    public function setNextstateForStatePoolSetsNextstate()
    {
        $nextstateFixture = new \CGB\Relax5project\Domain\Model\StatePool();
        $this->subject->setNextstate($nextstateFixture);

        self::assertAttributeEquals(
            $nextstateFixture,
            'nextstate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPrevstateReturnsInitialValueForStatePool()
    {
        self::assertEquals(
            null,
            $this->subject->getPrevstate()
        );
    }

    /**
     * @test
     */
    public function setPrevstateForStatePoolSetsPrevstate()
    {
        $prevstateFixture = new \CGB\Relax5project\Domain\Model\StatePool();
        $this->subject->setPrevstate($prevstateFixture);

        self::assertAttributeEquals(
            $prevstateFixture,
            'prevstate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowUserReturnsInitialValueForOwner()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAllowUser()
        );
    }

    /**
     * @test
     */
    public function setAllowUserForObjectStorageContainingOwnerSetsAllowUser()
    {
        $allowUser = new \CGB\Relax5core\Domain\Model\Owner();
        $objectStorageHoldingExactlyOneAllowUser = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAllowUser->attach($allowUser);
        $this->subject->setAllowUser($objectStorageHoldingExactlyOneAllowUser);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAllowUser,
            'allowUser',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAllowUserToObjectStorageHoldingAllowUser()
    {
        $allowUser = new \CGB\Relax5core\Domain\Model\Owner();
        $allowUserObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $allowUserObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($allowUser));
        $this->inject($this->subject, 'allowUser', $allowUserObjectStorageMock);

        $this->subject->addAllowUser($allowUser);
    }

    /**
     * @test
     */
    public function removeAllowUserFromObjectStorageHoldingAllowUser()
    {
        $allowUser = new \CGB\Relax5core\Domain\Model\Owner();
        $allowUserObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $allowUserObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($allowUser));
        $this->inject($this->subject, 'allowUser', $allowUserObjectStorageMock);

        $this->subject->removeAllowUser($allowUser);
    }

    /**
     * @test
     */
    public function getAllowGroupReturnsInitialValueForFrontendUserGroup()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAllowGroup()
        );
    }

    /**
     * @test
     */
    public function setAllowGroupForObjectStorageContainingFrontendUserGroupSetsAllowGroup()
    {
        $allowGroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup();
        $objectStorageHoldingExactlyOneAllowGroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAllowGroup->attach($allowGroup);
        $this->subject->setAllowGroup($objectStorageHoldingExactlyOneAllowGroup);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAllowGroup,
            'allowGroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAllowGroupToObjectStorageHoldingAllowGroup()
    {
        $allowGroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup();
        $allowGroupObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $allowGroupObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($allowGroup));
        $this->inject($this->subject, 'allowGroup', $allowGroupObjectStorageMock);

        $this->subject->addAllowGroup($allowGroup);
    }

    /**
     * @test
     */
    public function removeAllowGroupFromObjectStorageHoldingAllowGroup()
    {
        $allowGroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup();
        $allowGroupObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $allowGroupObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($allowGroup));
        $this->inject($this->subject, 'allowGroup', $allowGroupObjectStorageMock);

        $this->subject->removeAllowGroup($allowGroup);
    }
}
