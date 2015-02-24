<?php
namespace AgoraTeam\Agora\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Phillip Thiele <philipp.thiele@phth.de>
 *           Björn Christopher Bresser <bjoern.bresser@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Forum
 */
class Forum extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * parent
	 *
	 * @var \AgoraTeam\Agora\Domain\Model\Forum
	 * @lazy
	 */
	protected $parent = NULL;

    /**
     * parent
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Forum>
     * @cascade remove
     * @lazy
     */
    protected $subForums = NULL;

	/**
	 * threads
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread>
	 * @cascade remove
	 * @lazy
	 */
	protected $threads = NULL;

	/**
	 * groupsWithReadAccess
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group>
	 * @lazy
	 */
	protected $groupsWithReadAccess = NULL;

	/**
	 * groupWithWriteAccess
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group>
	 * @lazy
	 */
	protected $groupWithWriteAccess = NULL;

	/**
	 * groupsWithModificationAccess
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group>
	 * @lazy
	 */
	protected $groupsWithModificationAccess = NULL;

	/**
	 * usersWithReadAccess
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User>
	 * @lazy
	 */
	protected $usersWithReadAccess = NULL;

	/**
	 * usersWithWriteAccess
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User>
	 * @lazy
	 */
	protected $usersWithWriteAccess = NULL;

	/**
	 * usersWithModificationAccess
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User>
	 * @lazy
	 */
	protected $usersWithModificationAccess = NULL;

    /**
     * rootline
     *
     * @var array
     */
    protected $rootline = array();

	/**
	 * __construct
	 */
	public function __construct() {
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->subForums = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->threads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groupsWithReadAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groupWithWriteAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->groupsWithModificationAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->usersWithReadAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->usersWithWriteAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->usersWithModificationAccess = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

    /**
     * Returns the parent
     *
     * @return \AgoraTeam\Agora\Domain\Model\Forum $parent
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * Sets the parent
     *
     * @param \AgoraTeam\Agora\Domain\Model\Forum $parent
     * @return void
     */
    public function setParent(\AgoraTeam\Agora\Domain\Model\Forum $parent) {
        $this->parent = $parent;
    }

	/**
	 * Adds a SubForum
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Forum $subForum
	 * @return void
	 */
	public function addSubForum(\AgoraTeam\Agora\Domain\Model\Forum $subForum) {
		$this->subForums->attach($subForum);
	}

	/**
	 * Removes a Forum
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Forum $subForumToRemove The SubForum to be removed
	 * @return void
	 */
	public function removeSubForum(\AgoraTeam\Agora\Domain\Model\Forum $subForumToRemove) {
		$this->subForums->detach($subForumToRemove);
	}

	/**
	 * Returns the subForums
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Forum> $parent
	 */
	public function getSubForums() {
		return $this->subForums;
	}

	/**
	 * Sets the subForums
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Forum> $subForums
	 * @return void
	 */
	public function setSubForums(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $subForums) {
		$this->subForums = $subForums;
	}

	/**
	 * Adds a Thread
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Thread $thread
	 * @return void
	 */
	public function addThread(\AgoraTeam\Agora\Domain\Model\Thread $thread) {
		$this->threads->attach($thread);
	}

	/**
	 * Removes a Thread
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Thread $threadToRemove The Thread to be removed
	 * @return void
	 */
	public function removeThread(\AgoraTeam\Agora\Domain\Model\Thread $threadToRemove) {
		$this->threads->detach($threadToRemove);
	}

	/**
	 * Returns the threads
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread> $threads
	 */
	public function getThreads() {
		return $this->threads;
	}

	/**
	 * Sets the threads
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Thread> $threads
	 * @return void
	 */
	public function setThreads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $threads) {
		$this->threads = $threads;
	}

	/**
	 * Adds a Group
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAccess
	 * @return void
	 */
	public function addGroupsWithReadAccess(\AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAccess) {
		$this->groupsWithReadAccess->attach($groupsWithReadAccess);
	}

	/**
	 * Removes a Group
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAccessToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroupsWithReadAccess(\AgoraTeam\Agora\Domain\Model\Group $groupsWithReadAccessToRemove) {
		$this->groupsWithReadAccess->detach($groupsWithReadAccessToRemove);
	}

	/**
	 * Returns the groupsWithReadAccess
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithReadAccess
	 */
	public function getGroupsWithReadAccess() {
		return $this->groupsWithReadAccess;
	}

	/**
	 * Sets the groupsWithReadAccess
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithReadAccess
	 * @return void
	 */
	public function setGroupsWithReadAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupsWithReadAccess) {
		$this->groupsWithReadAccess = $groupsWithReadAccess;
	}

	/**
	 * Adds a Group
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccess
	 * @return void
	 */
	public function addGroupWithWriteAccess(\AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccess) {
		$this->groupWithWriteAccess->attach($groupWithWriteAccess);
	}

	/**
	 * Removes a Group
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccessToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroupWithWriteAccess(\AgoraTeam\Agora\Domain\Model\Group $groupWithWriteAccessToRemove) {
		$this->groupWithWriteAccess->detach($groupWithWriteAccessToRemove);
	}

	/**
	 * Returns the groupWithWriteAccess
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupWithWriteAccess
	 */
	public function getGroupWithWriteAccess() {
		return $this->groupWithWriteAccess;
	}

	/**
	 * Sets the groupWithWriteAccess
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupWithWriteAccess
	 * @return void
	 */
	public function setGroupWithWriteAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupWithWriteAccess) {
		$this->groupWithWriteAccess = $groupWithWriteAccess;
	}

	/**
	 * Adds a Group
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAccess
	 * @return void
	 */
	public function addGroupsWithModificationAccess(\AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAccess) {
		$this->groupsWithModificationAccess->attach($groupsWithModificationAccess);
	}

	/**
	 * Removes a Group
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAccessToRemove The Group to be removed
	 * @return void
	 */
	public function removeGroupsWithModificationAccess(\AgoraTeam\Agora\Domain\Model\Group $groupsWithModificationAccessToRemove) {
		$this->groupsWithModificationAccess->detach($groupsWithModificationAccessToRemove);
	}

	/**
	 * Returns the groupsWithModificationAccess
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithModificationAccess
	 */
	public function getGroupsWithModificationAccess() {
		return $this->groupsWithModificationAccess;
	}

	/**
	 * Sets the groupsWithModificationAccess
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\Group> $groupsWithModificationAccess
	 * @return void
	 */
	public function setGroupsWithModificationAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupsWithModificationAccess) {
		$this->groupsWithModificationAccess = $groupsWithModificationAccess;
	}

	/**
	 * Adds a User
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithReadAccess
	 * @return void
	 */
	public function addUsersWithReadAccess(\AgoraTeam\Agora\Domain\Model\User $usersWithReadAccess) {
		$this->usersWithReadAccess->attach($usersWithReadAccess);
	}

	/**
	 * Removes a User
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithReadAccessToRemove The User to be removed
	 * @return void
	 */
	public function removeUsersWithReadAccess(\AgoraTeam\Agora\Domain\Model\User $usersWithReadAccessToRemove) {
		$this->usersWithReadAccess->detach($usersWithReadAccessToRemove);
	}

	/**
	 * Returns the usersWithReadAccess
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithReadAccess
	 */
	public function getUsersWithReadAccess() {
		return $this->usersWithReadAccess;
	}

	/**
	 * Sets the usersWithReadAccess
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithReadAccess
	 * @return void
	 */
	public function setUsersWithReadAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usersWithReadAccess) {
		$this->usersWithReadAccess = $usersWithReadAccess;
	}

	/**
	 * Adds a User
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithWriteAccess
	 * @return void
	 */
	public function addUsersWithWriteAccess(\AgoraTeam\Agora\Domain\Model\User $usersWithWriteAccess) {
		$this->usersWithWriteAccess->attach($usersWithWriteAccess);
	}

	/**
	 * Removes a User
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithWriteAccessToRemove The User to be removed
	 * @return void
	 */
	public function removeUsersWithWriteAccessii(\AgoraTeam\Agora\Domain\Model\User $usersWithWriteAccessToRemove) {
		$this->usersWithWriteAccess->detach($usersWithWriteAccessToRemove);
	}

	/**
	 * Returns the usersWithWriteAccess
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithWriteAccess
	 */
	public function getUsersWithWriteAccess() {
		return $this->usersWithWriteAccess;
	}

	/**
	 * Sets the usersWithWriteAccess
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithWriteAccess
	 * @return void
	 */
	public function setUsersWithWriteAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usersWithWriteAccess) {
		$this->usersWithWriteAccess = $usersWithWriteAccess;
	}

	/**
	 * Adds a User
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithModificationAccess
	 * @return void
	 */
	public function addUsersWithModificationAccess(\AgoraTeam\Agora\Domain\Model\User $usersWithModificationAccess) {
		$this->usersWithModificationAccess->attach($usersWithModificationAccess);
	}

	/**
	 * Removes a User
	 *
	 * @param \AgoraTeam\Agora\Domain\Model\User $usersWithModificationAccessToRemove The User to be removed
	 * @return void
	 */
	public function removeUsersWithModificationAccess(\AgoraTeam\Agora\Domain\Model\User $usersWithModificationAccessToRemove) {
		$this->usersWithModificationAccess->detach($usersWithModificationAccessToRemove);
	}

	/**
	 * Returns the usersWithModificationAccess
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithModificationAccess
	 */
	public function getUsersWithModificationAccess() {
		return $this->usersWithModificationAccess;
	}

	/**
	 * Sets the usersWithModificationAccess
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AgoraTeam\Agora\Domain\Model\User> $usersWithModificationAccess
	 * @return void
	 */
	public function setUsersWithModificationAccess(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usersWithModificationAccess) {
		$this->usersWithModificationAccess = $usersWithModificationAccess;
	}

    /**
     * Returns the public
     *
     * @todo implement some functionality
     * @return boolean $public
     */
    public function getPublic() {
        return TRUE;
    }

    /**
     * Returns the boolean state of public
     *
     * @todo implement some functionality
     * @return boolean
     */
    public function isPublic() {
        return TRUE;
    }

    /**
     * Returns the rootline
     *
     * @return array
     */
    public function getRootline() {
        if(empty($this->rootline)) {
            $this->fetchNextRootlineLevel();
        }
        return $this->rootline;
    }

    /**
     * fetches next rootline level recursively
     *
     * @return void
     */
    public function fetchNextRootlineLevel() {

        if(empty($this->rootline)) {
            if (is_object($this->getParent())) {
                array_push($this->rootline, current($this->getParent()->getRootline()));
                array_push($this->rootline, $this);
            } else {
                array_push($this->rootline, $this);
            }
        }
    }

}